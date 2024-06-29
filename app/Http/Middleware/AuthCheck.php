<?php

namespace App\Http\Middleware;

use App\Repository\UserRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('loginId')) {
            if ($request->path() !== 'login' && $request->path() !== 'register') {
                return redirect()->route('login')->with('warning_message', 'You have to login first.');
            }
        } else {
            $userId = $this->userRepository->getCurrentUserId();

            $user = $this->userRepository->findById($userId);

            if ($user && $user->active == 0) {
                return redirect()->route('user.inactive');
            }
        }

        return $next($request);
    }
}
