<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Auth;

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

        return view('admin.post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create')->with('categories', Category::all())
                                            ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $request->validate([
            'featured' => 'image',
        ]);

        $featured = $request->featured;
        $featured_new_name = time() . $featured->getClientOriginalName();
        $featured->move('upload/post', $featured_new_name);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;

        $post->featured = 'upload/post/' . $featured_new_name;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);
        $post->user_id = \Auth::id();
        $post->save();

        $post->tags()->attach($request->tags);

        \Session::flash('success', "You have successfully added post {$post->title}");

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit')->with('post', $post)->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('upload/post', $featured_new_name);
            $post->featured = 'upload/post/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;

        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);
        $post->save();

        $post->tags()->sync($request->tags);

        \Session::flash('success', "You have successfully updated post {$post->title}");

        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        \Session::flash('success', "You have successfully deleted Post {$post->title}");

        return redirect()->route('post.index');
    }


}
