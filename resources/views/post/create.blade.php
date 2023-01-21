@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputTitle" value="{{ old('title') }}"
                    aria-describedby="TitleHelp">
                @error('title')
                    <div class="invalid-feedback" style="display: block"> {{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputAuthor" class="form-label">Author</label>
                <input type="text" name="author" class="form-control" id="exampleInputAuthor"
                    value="{{ old('author') }}">
                @error('author')
                    <div class="invalid-feedback" style="display: block"> {{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputContent" class="form-label">Author</label>
                <input type="text" name="content" value="{{ old('content') }}" class="form-control"
                    id="exampleInputContent">
                @error('content')
                    <div class="invalid-feedback" style="display: block"> {{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">Image</label>
                @error('image')
                    <div class="invalid-feedback" style="display: block"> {{ $message }}</div>
                @enderror
                <input type="file" name="image" class="form-control" aria-label="file example" id="exampleInputImage">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
