<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getIndex()
    {
        $posts = Post::paginate(5);
        return view('pages.blog_archieve')->withPosts($posts);
    }

    public function getPost($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('pages.blog_single')->withPost($post);
    }
}
