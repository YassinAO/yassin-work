@extends('layouts.admin')

@section('title', 'Dashboard projects')

@section('content')

<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>Projects overview</h2>
            <a href="/projects/create" class="btn-custom btn-create"><i class="fas fa-plus"></i></a>
        </div>
        <div class="dashboard-block">
                @if(count($projects) > 0 )
                <table>
                    
                    <thead>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </thead>
                        
                    @foreach($projects as $project)
                        <tr>
                            <td>{{$project->title}}</td>
                            <td>Python</td>
                            <td>
                                <a href="/projects/{{$project->id}}" class="btn-custom btn-view"><i class="fas fa-eye"></i></a>
                                <a href="/projects/{{$project->id}}/edit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('projects.destroy', $project->id)}}" style="display: inline-block;"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-custom btn-delete" onclick="return confirm('Are you sure?')" style="padding: 0px;"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </table>
                @else 
                    <p>No projects found.</p>
                @endif
        </div>
        <div class="dashboard-block">
            <div class="pagination">
                {!! $projects->links('partials.pagination'); !!}
                <small class="page">page {{$projects->currentPage()}} of {{$projects->lastPage()}}</small>
            </div>
        </div>
    </div>
</div>
@endsection