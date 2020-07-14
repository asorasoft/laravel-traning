<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->get();
        return view('backend.post.index', compact('posts'));
    }

    public function create()
    {
        return view('backend.post.create');
    }

    public function store(PostCreateRequest $request)
    {
        Post::create($request->all());

        flash('The post has been created successfully.');

        return redirect()->route('post.index');
    }

    public function delete(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->delete();

        return response()->json([
            'data' => null,
            'message' => [
                'message_en' => 'The post has been deleted',
                'message_km' => 'The post has been deleted',
            ]
        ]);
    }
}
