<?php

namespace App\Http\Controllers;

use App\Figured\Transformer;
use App\Post;

class PagesController extends Controller{

    public function index()
    {
		$posts = Post::where('published', '=', true)->get();
        return view('index', ['posts' => Transformer::transformPostCollection($posts)]);
    }

    public function show($slug)
    {
		$post = Post::where('slug', $slug)->first();
        return view('show', ['post' => Transformer::transformPost($post)]);
    }

}
