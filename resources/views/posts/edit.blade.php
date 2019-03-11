@extends('layouts.master')

@section('title', 'Post Edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div>
                    <h1>Post Edit</h1>
                </div>
                <hr>
                @include('posts.form')
            </div>
        </div>
    </div>
@endsection