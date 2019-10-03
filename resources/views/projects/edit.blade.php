@extends('layouts.admin')

@section('title', 'Edit')

@section('content')

<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>Edit project</h2>
        </div>
        <div class="dashboard-block">
            <div class="form-container">
                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="form-block">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="{{ $project->title }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('title') }}</span>
                    </div>
        
                    <div class="form-block">
                        <label for="name">Description</label>
                        <input type="text" name="description" value="{{ $project->description }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('description') }}</span>
                    </div>

                    <div class="form-block">
                        <label for="name">Category</label>
                        <select class="form-control" name="category_id">
        
                            @foreach($categories as $category)
                                @if($category->id == $project->category_id)
                                    <option value="{{ $category->id }}" selected="selected">{{ $category->title }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endif
                            @endforeach
        
                        </select>
                        <span class="error">{{ $errors->first('category') }}</span>
                    </div>
        
                    <div class="form-block">
                        <label for="name">Body</label>
                        <textarea name="body" id="textarea" rows="15" autocomplete="off" class="form-control">{{ $project->body }}</textarea>
                        <span class="error">{{ $errors->first('body') }}</span>
                    </div>
        
                    <div class="form-block">
                        <input type="file" name="cover_image" id="cover_image">
                        <span class="error">{{ $errors->first('cover_image') }}</span>
                    </div>
                    
                    <button type="submit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></button>
                    <a class="btn-custom btn-cancel" href="{{ url('dashboard/projects') }}"><i class="fas fa-times"></i></a>
                    @method('PUT')
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@endsection