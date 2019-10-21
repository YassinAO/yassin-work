@extends('layouts.admin')

@section('title', 'Edit')

@section('content')

<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>Edit career</h2>
        </div>
        <div class="dashboard-block">
            <div class="form-container">
                <form action="{{ route('careers.update', $career->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="form-block">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="{{ $career->title }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('title') }}</span>
                    </div>
        
                    <div class="form-block">
                        <label for="name">Description</label>
                        <input type="text" name="description" value="{{ $career->description }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('description') }}</span>
                    </div>

                    <div class="form-block">
                        <label for="name">Start date</label>
                        <input type="date" name="start_date" value="{{ $career->start_date->format('Y-m-d') }}" class="form-control">
                        <span class="error">{{ $errors->first('start_date') }}</span>
                    </div>

                    <div class="form-block">
                        <label for="name">End date</label>
                        <input type="date" name="end_date" value="{{ $career->end_date->format('Y-m-d') }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('end_date') }}</span>
                    </div>
        
                    <div class="form-block">
                        <label for="name">Body</label>
                        <textarea name="body" id="textarea" rows="15" autocomplete="off" class="form-control">{{ $career->body }}</textarea>
                        <span class="error">{{ $errors->first('body') }}</span>
                    </div>
        
                    <div class="form-block">
                        <input type="file" name="cover_image" id="cover_image" onchange="readURL(this)">
                        <img id="cover-preview" src="/storage/cover_images/careers/{{$career->cover_image}}" alt="" width="25%">
                        <span class="error">{{ $errors->first('cover_image') }}</span>
                    </div>
                    
                    <button type="submit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></button>
                    <a class="btn-custom btn-cancel" href="{{ url('dashboard/careers') }}"><i class="fas fa-times"></i></a>
                    @method('PUT')
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@endsection