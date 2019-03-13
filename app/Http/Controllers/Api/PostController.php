<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user', 'categories')
            ->limit(10)
            ->orderBy('created_at', 'desc')
            ->get();
        return message_success($posts);
    }
    public function getPostById($id){
        $post = Post::with('user', 'categories')->findOrFail($id);
        return message_success($post);
    }
}
