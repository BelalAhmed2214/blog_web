<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Http\Resources\ReplyResource;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use App\Models\Comment;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $replies = Reply::with('comment')->get();
        // dd($replies->toArray());
        return view('backend.replies.index',compact('replies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        // dd($comment->toArray());
        return view('backend.replies.create',compact('comment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReplyRequest $request)
    {
        // dd($request->toArray());
        $reply = new Reply();
        $reply->reply = $request->reply;
        $reply->comment_id = $request->comment_id;
        $reply->save();

        return redirect()->route('replies.index')->with('success', 'Reply Added');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        $reply = new ReplyResource($reply);
        return response()->json(["reply" => $reply, "status" => 200], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reply $reply)
    {
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
