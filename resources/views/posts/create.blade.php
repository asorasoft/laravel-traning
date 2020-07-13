@extends('layouts.app')

@section('title', 'New Post')

@section('content')
    @include('partials.header')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon
                    as possible!</p>
            </div>
            <div class="col-lg-8 col-md-10 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-8 col-md-10 mx-auto">
                <form name="sentMessage" id="contactForm"
                      @if (isset($post))
                        action="/post/update"
                      @else
                          action="/post/store"
                      @endif
                      method="POST">
                    {{ csrf_field() }}

                    @if (isset($post))
                        <input type="hidden" name="id" value="{{$post->id}}"/>
                    @endif

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text"
                                   class="form-control"
                                   placeholder="Please enter title"
                                   id="name"
                                   name="title"
                                   @if (isset($post))
                                   value="{{ $post->title }}"
                                   @else
                                   value="{{ old('title') }}"
                                   @endif
                                   data-validation-required-message="Please enter title.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Description</label>
                            <textarea rows="5"
                                      name="description"
                                      class="form-control"
                                      placeholder="Please enter description"
                                      id="message"
                                      data-validation-required-message="Please enter description">@if (isset($post)) {{ $post->description }} @else {{ old('description') }} @endif</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <button type="submit"
                            class="btn btn-primary"
                            id="sendMessageButton">
                        @if (isset($post))
                            Update Post
                        @else
                            New Post
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
