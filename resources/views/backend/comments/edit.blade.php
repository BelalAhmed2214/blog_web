@extends('layouts.app')

@section('content')
<div class="container">
@if (session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h3 class="mb-4">Edit Comment</h3>
    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Comment</label>
            <input type="text" name="comment" id="comment" class="form-control" value="{{ $comment->comment }}" required>
        </div>
      
        <button type="submit" class="btn btn-primary">Update Comment</button>
    </form>
</div>
@endsection
