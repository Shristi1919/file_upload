<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    protected $postRepository;
    protected $userRepository;

    public function __construct(PostRepository $postRepository, UserRepository $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $query = $this->postRepository->query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
        }

        $posts = $query->paginate(10);

        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $userId = $this->userRepository->getCurrentUserId();

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $userId,
        ];


        $this->postRepository->create($data);

        Session::flash('success_message', 'Post created successfully!');

        return redirect()->route('posts.index');
    }


    public function storetest(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $userId = $this->userRepository->getCurrentUserId();

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $userId,
        ];


        $post= $this->postRepository->create($data);
        return response()->json($post, 201);
    }




    public function show($id)
    {
        $post = $this->postRepository->findById($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = $this->postRepository->findById($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $userId = $this->userRepository->getCurrentUserId();

        $data = $request->all();
        $data['user_id'] = $userId;

        $this->postRepository->update($id, $data);

        Session::flash('success_message', 'Post updated successfully!');
        return redirect()->route('posts.index');
    }

    public function updatetest(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $userId = $this->userRepository->getCurrentUserId();

        $data = $request->all();
        $data['user_id'] = $userId;

        $post= $this->postRepository->update($id, $data);

        return response()->json($post, 200);

    }

    public function destroy($id)
    {
        $this->postRepository->delete($id);

        Session::flash('success_message', 'Post deleted successfully!');
        return redirect()->route('posts.index');
    }

    public function destroytest($id)
    {
       $this->postRepository->delete($id);
        return response()->json(['message' => 'Post deleted successfully'], 200);

    }

    public function userPosts($userId)
    {
        $posts = $this->postRepository->getPostsByUserId($userId);
        return view('posts.user_posts', compact('posts'));
    }
}

