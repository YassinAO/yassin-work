@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>Tags overview</h2>
        </div>
        <div class="dashboard-block">
            <div class="form-container">
                <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">

                    <div class="form-block">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" autocomplete="off" class="form-control">
                        <span class="error">{{ $errors->first('title') }}</span>
                    </div>

                    <div class="form-block">
                        <label for="name">Color</label>
                        <input type="text" name="color" id="color_value" value="{{ old('color') }}" class="form-control jscolor">
                        <span class="error">{{ $errors->first('color') }}</span>
                    </div>

                    <button type="submit" class="btn-custom btn-add"><i class="fas fa-check"></i></button>
                    @csrf
                </form>
            </div>
        </div>
        <div class="dashboard-block">
                @if(count($tags) > 0 )
                <table>
                    
                    <thead>
                        <th>Title</th>
                        <th># Hexa</th>
                        <th>Preview</th>
                        <th>Actions</th>
                    </thead>
                        
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->title}}</td>
                            <td>{{$tag->color}}</td>
                            <td><div class="color-preview" style="background-color: #{{$tag->color}}; width: 100%; height: 30px;"></div></td>
                            <td>
                                <a href="/tags/{{$tag->id}}/edit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('tags.destroy', $tag->id)}}" style="display: inline-block;"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-custom btn-delete" onclick="return confirm('Are you sure?')" style="padding: 0px;"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </table>
                @else 
                    <p>No tags found.</p>
                @endif
        </div>
        <div class="dashboard-block">
            <div class="pagination-container">
                {!! $tags->links('partials.pagination'); !!}
                <small class="page">page {{$tags->currentPage()}} of {{$tags->lastPage()}}</small>
            </div>
        </div>
    </div>
</div>
@endsection