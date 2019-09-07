<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array(
            'title' => 'required|max:255',
            'slug' => 'required|min:5|max:255|unique:posts,slug',
            'category' => 'required|integer',
            'body' => 'required',
            'image' => 'sometimes'
        ));

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category');
        $post->body = clean($request->body);

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('/', 'public');
        }

        $post->save();

        $post->tags()->sync($request->input('tags_id'));

        return redirect()->route('post.show', [$post->id])->with('success', 'The blog post has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::find($id);
        $this->authorize('view', $post);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(array(
            'title' => 'required|max:255',
            'slug' => "required|min:5|max:255|unique:posts,slug,{$id}",
            'category' => 'required|integer',
            'body' => 'required',
            'image' => 'sometimes'
        ));

        $post = Post::find($id);

        $post->title = $request->title;
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category');
        $post->body = clean( $request->body );
        
        if ($request->hasFile('image')) {
            if (!empty($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('image')->store('/', 'public');
        }

        $post->save();

        $post->tags()->sync($request->input('tags_id'));

        return redirect()->route('post.show', ['id' => $post->id])->with( 'success', "Post $post->id has been updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();

        if (!empty($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('post.index')->with('success', "Post deleted successfully!");
    }

    public function deleteFile($post_id, $filename)
    {
        $post = Post::findOrFail($post_id);
        $post->image = NULL;
        $post->save();

        Storage::disk('public')->delete($filename);

        return redirect()->route('post.show', $post->id)->withSuccess("File deleted");
    }
}
