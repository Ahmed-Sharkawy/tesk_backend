<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{

    private $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function index()
    {
        $posts = $this->model->with('comments')->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StoreRequest $request)
    {
        $pathImageUrl = uploadImage($request->image, 'posts');

        $this->model->create(['image' => $pathImageUrl] + $request->validated());
        return redirect()->route('dashboard.dashboard');
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $pathImageUrl = $post->image;

        if ($request->image) {
            deletImage($post->image);
            $pathImageUrl = uploadImage($request->image, 'posts');
        }

        $post->update(['image' => $pathImageUrl] + $request->validated());
        return redirect()->route('dashboard.dashboard');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard.dashboard');
    }

    public function onlyTrashed()
    {
        $posts = $this->model->onlyTrashed()->with('comments')->get();
        return view('post.deleted', compact('posts'));
    }

    public function restore($id)
    {
        $post = $this->model->withTrashed()->find($id);

        $post->restore();
        return redirect()->route('dashboard.dashboard');
    }

    public function forceDelete($id)
    {
        $post = $this->model->withTrashed()->find($id);

        $post->forceDelete();
        return redirect()->route('dashboard.dashboard');
    }
}
