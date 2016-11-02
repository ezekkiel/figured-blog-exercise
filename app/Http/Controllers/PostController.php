<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Figured\Transformer;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => Transformer::transformPostCollection($posts)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:mongodb.posts|max:255',
            'body' => 'required',
        ]);

        $post = new Post;

        $post->title = $request->input('title');
        $post->slug = str_slug($request->input('title'));
        $post->body = htmlentities($request->input('body'), ENT_QUOTES);
		$post->user = \Auth::user()->name;
        $post->published = (bool) $request->input('published');

        $post->save();

        Session::flash('message', "Post was created.");

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show');
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
        return view('posts.edit', ['post' => Transformer::transformPost($post)]);
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
		$this->validate($request, [
			'title' => "required|unique:mongodb.posts,{$id}|max:255",
			'body'  => "required",
		]);

		$post = Post::find($id);

		$post->title = $request->input('title');
		$post->slug = str_slug($request->input('title'));
		$post->body = $request->input('body');
		$post->published = (bool) $request->input('published');

		$post->save();

		Session::flash('message', "Post was updated.");

		return redirect()->route('posts.index');
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
        $post->delete();

        Session::flash('message', "Post was delete.");

        return redirect()->route('posts.index');
    }
}
