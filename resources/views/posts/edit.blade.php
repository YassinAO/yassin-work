@extends('layouts.admin')

@section('title', 'Edit')

@section('content')

<div class="container">
    <div class="form-container">
        <div class="form-header">
            <h2>Edit Post</h2>
        </div>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            <div class="form-block">
                <label for="name">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                <span class="error">{{ $errors->first('title') }}</span>
            </div>

            <div class="form-block">
                <label for="name">Description</label>
                <input type="text" name="description" value="{{ $post->description }}" class="form-control">
                <span class="error">{{ $errors->first('description') }}</span>
            </div>

            <div class="form-block">
                <label for="name">Category</label>
                <select class="form-control" name="category_id">

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach

                </select>
                <span class="error">{{ $errors->first('category') }}</span>
            </div>

            <div class="form-block">
                <label for="name">Body</label>
                <textarea name="body" id="textarea" rows="15" class="form-control">{{ $post->body }}</textarea>
                <span class="error">{{ $errors->first('body') }}</span>
            </div>

            <div class="form-block">
                <input type="file" name="cover_image" id="cover_image">
                <span class="error">{{ $errors->first('cover_image') }}</span>
            </div>
            
            <button type="submit" class="btn-custom btn-edit">Edit</button>
            <a class="btn btn-custom btn-cancel" href="{{ route('dashboard') }}">Cancel</a>
            @method('PUT')
            @csrf
        </form>
    </div>
</div>

@endsection