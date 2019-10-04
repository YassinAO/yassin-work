@extends('layouts.admin')

@section('title', 'Create')

@section('content')

<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>New service</h2>
        </div>
        <div class="dashboard-block">
            <div class="form-container">
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
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
                    
                    <button type="submit" class="btn-custom btn-add"><i class="fas fa-check"></i></button>
                    <a class="btn-custom btn-cancel" href="{{ url('dashboard/services') }}"><i class="fas fa-times"></i></a>
                    @csrf
                </form>
            </div>
        </div>
    </div>   
</div>

@endsection