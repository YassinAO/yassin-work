@extends('layouts.admin')

@section('title', 'Edit')

@section('content')

<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>Edit post</h2>
        </div>
        <div class="dashboard-block">
            <div class="form-container">
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
                                @if($category->id == $post->category_id)
                                    <option value="{{ $category->id }}" selected="selected">{{ $category->title }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endif
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
                        <textarea name="body" id="textarea" rows="15" class="form-control">{{ $post->body }}</textarea>
                        <span class="error">{{ $errors->first('body') }}</span>
                    </div>
        
                    <div class="form-block">
                        <input type="file" name="cover_image" id="cover_image"  onchange="readURL(this)">
                        <img id="cover-preview" src="/storage/cover_images/posts/{{$post->cover_image}}" alt="" width="25%">
                        <span class="error">{{ $errors->first('cover_image') }}</span>
                    </div>
                    
                    <button type="submit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></button>
                    <a class="btn-custom btn-cancel" href="{{ url('dashboard/posts') }}"><i class="fas fa-times"></i></a>
                    @method('PUT')
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
</script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{ asset('js/tinymce.js') }}"></script>
@endsection