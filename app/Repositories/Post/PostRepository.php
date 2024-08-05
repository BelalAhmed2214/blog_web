<?php

namespace App\Repositories\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Post\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function store($request)
    {
        $post = new Post();
        $post->title = $request['title'];
        $post->description = $request['description'];
        $post->is_active = $request['is_active'] ?? 0;
        $post->user_id = Auth::user()->id;
        $post->save();

        return $post;
    }

    public function update($request, Model $post)
    {
        $request['is_active'] = isset($request['is_active']) && $request['is_active'] === 'on' ? 1 : 0;

        $isSame = (
            $post->title === $request['title'] &&
            $post->description === $request['description'] &&
            $post->is_active === $request['is_active']
        );

        if ($isSame) {
            return false;
        }

        $post->update($request);

        return $post;
    }

    public function delete(Model $post)
    {
        $post->delete();
    }
}
