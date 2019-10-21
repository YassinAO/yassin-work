@extends('layouts.admin')

@section('title', 'Edit')

@section('content')

<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>Edit service</h2>
        </div>
        <div class="dashboard-block">
            <div class="form-container">
                <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="form-block">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="{{ $service->title }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('title') }}</span>
                    </div>
        
                    <div class="form-block">
                        <label for="name">Description</label>
                        <input type="text" name="description" value="{{ $service->description }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('description') }}</span>
                    </div>

                    <div class="form-block">
                        <label for="name">Fontawesome classname<br>Example: <strong>fas fa-code<strong></label>
                        <input type="text" name="icon" value="{{ $service->icon }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('icon') }}</span>
                    </div>
                    
                    <button type="submit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></button>
                    <a class="btn-custom btn-cancel" href="{{ url('dashboard/services') }}"><i class="fas fa-times"></i></a>
                    @method('PUT')
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@endsection