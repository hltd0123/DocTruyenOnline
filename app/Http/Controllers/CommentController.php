<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::all();

        return new CommentCollection($comments);
    }

    public function store(CommentStoreRequest $request)
    {
        $comment = Comment::create($request->validated());

        return new CommentResource($comment);
    }

    public function show(Request $request, Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        return new CommentResource($comment);
    }

    public function destroy(Request $request, Comment $comment)
    {
        $comment->delete();

        return response()->noContent();
    }
}
