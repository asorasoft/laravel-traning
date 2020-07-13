<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function detail($id)
    {
        $post = Post::with(['user'])->findOrFail($id);
        return view('single', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.create', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostCreateRequest $request)
    {
        Post::create($request->all());
        return redirect('/');
    }

    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->update($request->all());

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->delete();

        return redirect('/');
    }
}
