<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements CommentRepositoryInterface
{
    public function getAllComments()
    {
        return Comment::all();
    }

    public function store(array $data)
    {
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->post_id = $data['post_id'];
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return $comment;
    }

    public function update(array $data, Model $comment)
    {
        $isSame = ($comment->comment === $data['comment']);

        if ($isSame) {
            return false;
        }

        $comment->update($data);

        return $comment;
    }

    public function delete(Model $comment)
    {
        $comment->delete();
    }
}
