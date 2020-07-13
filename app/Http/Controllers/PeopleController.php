<?php

namespace App\Http\Controllers;

use App\Post;

class PeopleController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user'])
            ->orderBy('published_at', 'desc')
            ->paginate(25);

        return view('index', compact('posts'));
    }

    public function about()
    {
        return view('about');
    }

    public function single()
    {
        return view('single');
    }

    public function contact()
    {
        return view('contact');
    }
}
