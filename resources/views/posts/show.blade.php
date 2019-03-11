@extends('layouts.master')

@section('title', 'Show')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div>
                    <h1>Post Detail</h1>
                </div>
                <hr>
                @if(isset($post))
                    <div class="post-preview">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h5 class="post-subtitle">
                            {!! "$post->description" !!}
                        </h5>
                        <p class="post-meta">
                            @if(auth()->user()->id == $post->user->id)
                                Posted by
                                <a href="#">
                                    {{ $post->user->name }}
                                </a>
                            @else
                                Posted
                            @endif
                            on {{ (\Carbon\Carbon::parse($post->created_at)->diffForHumans()) }}
                            @if(auth()->user()->id == $post->user->id)
                                | <a href="{{ route('post.edit',$post->id) }}">Edit</a>
                                | <a href="{{ route('post.delete', $post->id) }}">Delete</a>
                                |
                            @endif
                            @if(count($post->categories)>0)
                                Categories:
                                @if(auth()->user()->id == $post->user->id)
                                    @foreach($post->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                @else
                                    {{ count($post->categories) }}
                                @endif
                            @else
                                No Category
                            @endif
                        </p>
                    </div>
                @endif
                <div>
                    <a href="{{ route('home') }}" class="float-right btn btn-sm btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
