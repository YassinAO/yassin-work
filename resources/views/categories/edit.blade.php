@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>Edit category</h2>
        </div>
        <div class="dashboard-block">
            <div class="form-container">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="form-block">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="{{ $category->title }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('title') }}</span>
                    </div>
    
                    <button type="submit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></button>
                    <a class="btn-custom btn-cancel" href="{{ url('dashboard/categories') }}"><i class="fas fa-times"></i></a>
                    @method('PUT')
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection