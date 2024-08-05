@extends('layouts.app')

@section('title')
    View Post
@endsection

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="mt-4">
            <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
        </div>        
        <!-- @can('edit posts')
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit Post</a>
        @endcan -->
    </div>

    <div class="card">
        <div class="card-header">
            Post Details
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{ $post->title }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $post->description }}</p>
            <p class="card-text"><strong>Active:</strong> {{ $post->is_active ? 'Yes' : 'No' }}</p>
            <p class="card-text"><strong>Publisher:</strong> {{ $post->user->name }}</p>
            <p class="card-text"><strong>Comment:</strong> {{ $post->user->name }}</p>
        </div>
        <div class="card-footer text-muted">
            Created at: {{ $post->created_at->format('d M Y, H:i') }}
        </div>
    </div>

    

    <div class="mt-4">
        <h3 class="mb-4">Add Comment</h3>
        <form action="{{route('comments.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="comment">Comment</label>
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <textarea name="comment" id="comment" class="form-control" ></textarea>
                @error('comment')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
    </div>

    <div class="mt-4">
        <h3 class="mb-4">Comments</h3>
        @if($post->comments->isEmpty())
            <p>No comments yet. Be the first to commentc!</p>
        @else
            @foreach($post->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comment->user->name }}</h5>
                            <p class="card-text">{{ $comment->comment }}</p>
                            <p class="card-text"><small class="text-muted">Posted at: {{ $comment->created_at->format('d M Y, H:i') }}</small></p>
                        </div>
                    </div>
            @endforeach
        @endif
    </div>

</div>
@endsection
