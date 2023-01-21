@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between ">
                <a href="{{ route('dashboard.posts.create') }}" style="width: 120px" class="btn btn-success mb-5 col-m-4">Create Post</a>
                <a href="{{ route('dashboard.posts.onlyTrashed') }}" style="width: 120px" class="btn btn-danger mb-5 col-m-4">Deleted</a>
        </div>

        <div class="row justify-content-between">
            @foreach ($posts as $post)
                <div class="card col-m-4  mb-4" style="width: 18rem;">
                    <img src="{{ asset("storage/$post->image") }}" style="width: 100%; height: 200px" class="card-img-top mt-4" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->author }}</p>
                            <a href="{{ route('dashboard.posts.edit', $post->slug) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('dashboard.posts.destroy', $post->slug) }}" class="btn btn-danger">Delete</a>
                    </div>

                    <hr/>
                    <div for="add-comment" class="form-label">Comments</div>

                    <div class="card-body">
                        @foreach ($post->comments as $i => $comment)
                            <hr/>
                            <p>{{ $i+1 }} - {{ $comment->comment }}</p>
                        @endforeach
                    </div>

                    <form action="{{ route('dashboard.comment.post', $post->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            @error('comment')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            <hr/>
                            <label for="add-comment" class="form-label">Add comment</label>
                            <input type="text" name="comment" class="form-control" id="add-comment">
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Add Comment</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
