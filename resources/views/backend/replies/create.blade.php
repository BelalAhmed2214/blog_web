@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Add Reply on Comment</h3>
    <form action="{{route('replies.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="reply">Reply</label>
            <input type="hidden" name="comment_id" value="{{$comment->id}}">
            <textarea name="reply" id="reply" class="form-control" ></textarea>
            @error('reply')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
</div>
@endsection
