<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        try {
            $this->validate($request, [
                'blog_id' => 'required|integer',
                'name' => 'required|string',
                'email' => 'required|email',
                'comment' => 'required|string',
            ]);

            $comment = Comment::create([
                'blog_id' => $request->input('blog_id'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'comment' => $request->input('comment'),
            ]);

            // Return a suitable response indicating success
            return response()->json(['message' => 'Comment created successfully'], 201);

        } catch (Exception $e) {
            \Log::error($e);
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
