@extends('layouts.master')

@section('title', 'Post Create')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div>
                    <h1>Post Create</h1>
                </div>
                <hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @include('posts.form')
            </div>
        </div>
    </div>
@endsection

