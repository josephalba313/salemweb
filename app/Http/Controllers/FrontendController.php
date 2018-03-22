<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index')
            ->with('title', 'Salem Web')
            ->with('categories', Category::take(7)->get())
            ->with('first_post', Post::orderBy('created_at', 'desc')->first())
            ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
        ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first());
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');
        return view('single')
            ->with('post', $post)
            ->with('title', $post->title)
            ->with('categories', Category::take(7)->get())
            ->with('next', Post::find($next_id))
            ->with('previous', Post::find($prev_id))
            ->with('tags', \App\Tag::all());
    }

    public function Category($id)
    {
        $category = Category::find($id);
        return view('category')->with('category', $category)
            ->with('title', $category->name)
            ->with('categories', Category::take(7)->get());
    }

    public function Tag($id)
    {
        $tag = Tag::find($id);
        return view('tag')->with('tag', $tag)
            ->with('title', $tag->tag)
            ->with('categories', Category::take(7)->get());
    }

}
