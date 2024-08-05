<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Post\PostRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Comment\CommentRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind the IResourceService interface to the PostService implementation
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
    */
    public function boot()
    {
        //
    }
}
