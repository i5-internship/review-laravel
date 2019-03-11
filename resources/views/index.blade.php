@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @if(isset($posts) && count($posts)>0)
                    @foreach($posts as $post)
                        <div class="post-preview">
                            <a href="{{ route('post.show', $post->id) }}">
                                <h2 class="post-title">
                                    {{ $post->title }}
                                </h2>
                                <h3 class="post-subtitle">
                                    {{ str_limit($post->description, 100) }}
                                </h3>
                            </a>
                            <p class="post-meta">
                                @if(auth()->user() == $post->user)
                                    Posted by
                                    <a href="#">
                                        {{ $post->user->name }}
                                    </a>
                                @else
                                    Posted
                                @endif
                                on {{ (\Carbon\Carbon::parse($post->created_at)->diffForHumans()) }}
                                @if(auth()->user()== $post->user)
                                    | <a href="{{ route('post.edit', $post->id) }}">Edit</a>
                                    | <a href="{{ route('post.delete', $post->id) }}">Delete</a>
                                @endif
                                |
                                @if(count($post->categories)>0)
                                    Categories: {{count($post->categories)}}
                                @else
                                    No Category
                                @endif
                            </p>
                        </div>
                    @endforeach
                @endif
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection