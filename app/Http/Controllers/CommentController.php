<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|min:3'
        ]);

        $comment = new Comment();
        $comment->message = $request->input('comment');
        $comment->user_id = $request->user()->id;

        $post = Post::findOrFail($id);
        $comment->post()->associate($post);

        $comment->save();


        return redirect()->route('post.show', $id)->withSuccess("Comment saved");

    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('post.show', $comment->post->id)->withSuccess("Comment Deleted");
    }
}
