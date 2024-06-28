<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;




class AuthenController extends Controller
{
    // Registration
    public function registration()
    {
        return view('auth.registration');
    }

    // Register User
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:12'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $result = $user->save();
        if($result){
            return back()->with('success', 'You have registered successfully.');
        } else {
            return back()->with('fail', 'Something went wrong!');
        }
    }

    // Login
    public function login()
    {
        return view('auth.login');
    }

    // Login User
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12'
        ]);

        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            $request->session()->put('loginId', $user->id);
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return back()->with('fail', 'Invalid email or password.');
        }
    }

    // Dashboard
    public function dashboard()
    {
        $data = [];
        if(Session::has('loginId')){
            $data = User::where('id', Session::get('loginId'))->first();
        }

        // dd($data);

        return view('dashboard', compact('data'));
    }

    // Logout
    public function logout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}


