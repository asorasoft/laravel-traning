@extends('layouts.app')

@section('title', 'About')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $post->title }}</h1>
                        <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                        <span class="meta">Posted by
              <a href="#">{{ $post->user->name }}</a>
              on {{ \Carbon\Carbon::parse($post->published_at)->isoFormat('dddd Do MMMM Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {{ $post->description }}

                    <p>Placeholder text by
                        <a href="http://spaceipsum.com/">Space Ipsum</a>. Photographs by
                        <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p>
                </div>
            </div>
        </div>
    </article>
@endsection
