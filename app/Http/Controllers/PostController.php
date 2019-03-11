<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Post\EditPostRequest;
use App\Http\Requests\Post\StorePostRequest;
use App\Post;
use App\User;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // get all users
        $users = User::all();

        // get all categories
        $categories = Category::all();

        return view('posts.create', compact('users', 'categories'));
    }

    public function store(StorePostRequest $request)
    {
        // validate form input post
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $post = null;

        try {

            DB::beginTransaction();

            if ($request->id) {
                $post = Post::findOrFail($request->id);
                $post->update($request->all());
            } else {
                $request['user_id'] = \auth()->user()->id;
                $post = Post::create($request->all());
            }

            if ($post instanceof Post) {
                $post->categories()->sync($request->category_id);
            }

            DB::commit();
            return redirect()->route('post.show',$post->id);

        } catch (\exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return Response
     */
    public function edit(EditPostRequest $request ,$id)
    {
        $post = Post::findOrFail($id);
        $users = User::all();
        $categories = Category::all();
        return view('posts.edit', compact('post', 'users', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $post
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('home');
    }
}
