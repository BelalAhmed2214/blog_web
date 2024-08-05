<?php

namespace App\Repositories\Comment;

use Illuminate\Database\Eloquent\Model;

interface CommentRepositoryInterface
{
    public function getAllComments();
    
    public function store(array $data);
    
    public function update(array $data, Model $resource);
    
    public function delete(Model $resource);
}
