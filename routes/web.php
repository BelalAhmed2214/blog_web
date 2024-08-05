<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

Route::group(['prefix' => 'users'], function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('LoginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('comments/{postId}/create', [CommentController::class, 'create'])->name('comment.create');
    Route::get('replies/{commentId}/create', [ReplyController::class, 'create'])->name('reply.create');
    Route::resource('replies', ReplyController::class);
    
    Route::group(['middleware' => ['role:admin']], function() {
        Route::get('roles/{id}/assign_permissions', [RoleController::class, 'assignPermissions'])->name('roles.assign_permissions');
        Route::put('roles/{id}/update_permissions', [RoleController::class, 'updatePermissions'])->name('roles.update_permissions');
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users', UserController::class);
        Route::resource('posts', PostController::class);
        Route::resource('comments', CommentController::class);

    });

    Route::group(['middleware' => ['role:admin|editor']], function () {
        Route::resource('comments', CommentController::class)->only(['create', 'store', 'edit', 'update']);
        Route::resource('posts', PostController::class)->only(['create', 'store', 'edit', 'update']);
    });

    Route::group(['middleware' => ['role:admin|editor|viewer']], function () {
        Route::resource('comments', CommentController::class)->only(['index', 'show']);
        Route::resource('posts', PostController::class)->only(['index', 'show']);
    });
});

/*
user publish posts and each post has comments and the comments have replies on it and there roles and permissions for 
admin: have all abilities 
editor: could view and update and create and show posts and comments not deleting
viewers: could view posts and show and comments only 
*/