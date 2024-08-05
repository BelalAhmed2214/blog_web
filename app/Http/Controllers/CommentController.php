<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use App\Repositories\Comment\CommentRepositoryInterface;

class CommentController extends Controller
{
    protected $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->commentRepository = $commentRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = $this->commentRepository->getAllComments();
        return view('backend.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($postId)
    {
        $post = Post::findOrFail($postId);
        return view('backend.comments.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        // dd($request->toArray());
        $this->commentRepository->store($request->all());
        return redirect()->route('comments.index')->with('success', 'Comment Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $comment = new CommentResource($comment);
        return response()->json(["comment" => $comment, "status" => 200], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('backend.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $updatedComment = $this->commentRepository->update($request->all(), $comment);

        if (!$updatedComment) {
            return redirect()->route('comments.edit', $comment->id)
                ->with('info', "You didn't make any updates");
        }

        return redirect()->route('comments.index')->with('success', 'Comment Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->commentRepository->delete($comment);
        return redirect()->route('comments.index')->with('success', 'Comment Deleted Successfully');
    }
}
