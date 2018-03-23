<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Post;
use \App\Category;
use \App\Tag;
use Carbon\Carbon;
class PostsController extends Controller
{
    public function index(){
    	$post = Post::all();
    	return view('admin.posts.index', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'excerpt' => 'required',
            'tags' => 'required'    

        ]); // Este metod
        $post = new Post;
        $post->title = $request->get('title');
        $post->url = str_slug($request->get('title'));
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt');
        $post->category_id = $request->get('category');
        $post->published_at = $request->has('published_at') == 1 ?  Carbon::parse($request->get('published_at')) : NULL;
        $post->save();

        $post->tags()->attach($request->get('tags'));

        return back()->with('flash', 'Tu publicacion ha sido creada');
    }
}
