@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="/post/detail/{{ $post->id }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle">{{ \Illuminate\Support\Str::limit($post->description, 120, ' (...)') }}</h3>
                        </a>
                        @if (!\Illuminate\Support\Facades\Auth::guest())
                            @if ($post->user_id == auth()->user()->id)
                                <a href="/post/edit/{{ $post->id }}">Edit</a> | <a href="/post/delete/{{ $post->id }}">Delete</a>
                            @endif
                        @endif
                        <p class="post-meta">Posted by
                            <a href="#">{{ $post->user->name }}</a>
                            on {{ \Carbon\Carbon::parse($post->published_at)->isoFormat('dddd Do MMMM Y') }}</p>
                    </div>
                    <hr>
            @endforeach
            <!-- Pager -->
                <div class="clearfix">
                    @if ($posts->onFirstPage())
                        <a class="btn btn-primary float-right" href="{{ $posts->nextPageUrl() }}">Next Posts &rarr;</a>
                    @elseif ($posts->hasMorePages())
                        <a class="btn btn-primary float-right" href="{{ $posts->nextPageUrl() }}">Next Posts &rarr;</a>
                        <a class="btn btn-primary float-right" href="{{ $posts->previousPageUrl() }}">Previous Posts &rarr;</a>
                    @elseif ($posts->lastPage())
                        <a class="btn btn-primary float-right" href="{{ $posts->previousPageUrl() }}">Previous Posts &rarr;</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
