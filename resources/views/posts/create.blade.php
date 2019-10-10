@extends('layouts.admin')

@section('title', 'Create')

@section('content')

<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>New post</h2>
        </div>
        <div class="dashboard-block">
            <div class="form-container">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="form-block">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('title') }}</span>
                    </div>
        
                    <div class="form-block">
                        <label for="name">Description</label>
                        <input type="text" name="description" value="{{ old('description') }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('description') }}</span>
                    </div>

                    <div class="form-block">
                        <label for="name">Category</label>
                        <select class="form-control" name="category_id">
        
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
        
                        </select>
                        <span class="error">{{ $errors->first('category_id') }}</span>
                    </div>

                    <div class="form-block">
                        <label for="name">Tag</label>
                        <select class="form-control select2-multi" name="tag_id[]" multiple="multiple">
        
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
        
                        </select>
                        <span class="error">{{ $errors->first('tag_id') }}</span>
                    </div>
        
                    <div class="form-block">
                        <label for="name">Body</label>
                        <textarea name="body" id="textarea" rows="15" autocomplete="off" class="form-control">{{ old('body') }}</textarea>
                        <span class="error">{{ $errors->first('body') }}</span>
                    </div>
        
                    <div class="form-block">
                        <input type="file" name="cover_image" id="cover_image" onchange="readURL(this)">
                        <img id="cover-preview" src="#" alt="" width="25%">
                        <span class="error">{{ $errors->first('cover_image') }}</span>
                    </div>
                    
                    <button type="submit" class="btn-custom btn-add"><i class="fas fa-check"></i></button>
                    <a class="btn-custom btn-cancel" href="{{ url('dashboard/posts') }}"><i class="fas fa-times"></i></a>
                    @csrf
                </form>
            </div>
        </div>
    </div>   
</div>
<script type="text/javascript">
    $('.select2-multi').select2();
</script>
@endsection