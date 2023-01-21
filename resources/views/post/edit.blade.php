@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('dashboard.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputTitle" value="{{ old('title', $post->title) }}"
                    aria-describedby="TitleHelp">
                @error('title')
                    <div class="invalid-feedback" style="display: block"> {{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputAuthor" class="form-label">Author</label>
                <input type="text" name="author" value="{{ old('author', $post->author) }}" class="form-control"
                    id="exampleInputAuthor">
                @error('author')
                    <div class="invalid-feedback" style="display: block"> {{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputContent" class="form-label">Content</label>
                <input type="text" name="content" value="{{ old('content', $post->content) }}" class="form-control"
                    id="exampleInputContent">
                @error('content')
                    <div class="invalid-feedback" style="display: block"> {{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" aria-label="file example" id="exampleInputImage">
                @error('image')
                    <div class="invalid-feedback" style="display: block"> {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
