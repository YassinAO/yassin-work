@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>Categories overview</h2>
        </div>
        <div class="dashboard-block">
            <div class="form-container">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="form-block">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                        <span class="error">{{ $errors->first('title') }}</span>
                    </div>

                    <button type="submit" class="btn-custom btn-add"><i class="fas fa-check"></i></button>
                    @csrf
                </form>
            </div>
        </div>
        <div class="dashboard-block">
                @if(count($categories) > 0 )
                <table>
                    
                    <thead>
                        <th>Title</th>
                        <th>Actions</th>
                    </thead>
                        
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->title}}</td>
                            <td>
                                <a href="/categories/{{$category->id}}/edit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('categories.destroy', $category->id)}}" style="display: inline-block;"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-custom btn-delete" onclick="return confirm('Are you sure?')" style="padding: 0px;"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </table>
                @else 
                    <p>No categories found.</p>
                @endif
        </div>
        {{-- <div class="dashboard-block">
            <div class="pagination">
                {!! $categories->links('partials.pagination'); !!}
                <small class="page">page {{$categories->currentPage()}} of {{$categories->lastPage()}}</small>
            </div>
        </div> --}}
    </div>
</div>
@endsection