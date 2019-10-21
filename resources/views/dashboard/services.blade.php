@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>services overview</h2>
            <a href="/services/create" class="btn-custom btn-create"><i class="fas fa-plus"></i></a>
        </div>
        <div class="dashboard-block">
                @if(count($services) > 0 )
                <table>
                    
                    <thead>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Actions</th>
                    </thead>
                        
                    @foreach($services as $service)
                        <tr>
                            <td>{{$service->title}}</td>
                            <td>{{$service->description}}</td>
                            <td><i class="{{$service->icon}} fa-2x"></i></td>
                            <td>
                                <a href="/services/{{$service->id}}/edit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('services.destroy', $service->id)}}" style="display: inline-block;"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-custom btn-delete" onclick="return confirm('Are you sure?')" style="padding: 0px;"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </table>
                @else 
                    <p>No services found.</p>
                @endif
        </div>
        <div class="dashboard-block">
            <div class="pagination-container">
                {!! $services->links('partials.pagination'); !!}
                <small class="page">page {{$services->currentPage()}} of {{$services->lastPage()}}</small>
            </div>
        </div>
    </div>
</div>
@endsection