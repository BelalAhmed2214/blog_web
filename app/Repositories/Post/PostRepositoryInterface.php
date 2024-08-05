<?php

namespace App\Repositories\Post;

use Illuminate\Database\Eloquent\Model;

interface PostRepositoryInterface
{
    public function getAllPosts();

    public function store($data);
    
    public function update($data, Model $resource);
    
    public function delete(Model $resource);
}
