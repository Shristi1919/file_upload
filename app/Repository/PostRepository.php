<?php

namespace App\Repository;

use App\Models\Post;

class PostRepository
{
    public function all()
    {
        return Post::all();
    }

    public function findById($id)
    {
        return Post::findOrFail($id);
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function update($id, array $data)
    {
        $post = Post::findOrFail($id);
        $post->update($data);
        return $post;
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }

    public function getPostsByUserId($userId)
    {
        return Post::where('user_id', $userId)->get();
    }

        public function query()
    {
        return Post::query();
    }


}
