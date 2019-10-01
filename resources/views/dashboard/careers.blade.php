@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>Careers overview</h2>
            <a href="/careers/create" class="btn-custom btn-create"><i class="fas fa-plus"></i></a>
        </div>
        <div class="dashboard-block">
                @if(count($careers) > 0 )
                <table>
                    
                    <thead>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Last modified</th>
                        <th>Actions</th>
                    </thead>
                        
                    @foreach($careers as $career)
                        <tr>
                            <td>{{$career->title}}</td>
                            <td>Python</td>
                            <td>{{date('d-m-Y', strtotime($career->updated_at))}}</td>
                            <td>
                                <a href="/careers/{{$career->id}}" class="btn-custom btn-view"><i class="fas fa-eye"></i></a>
                                <a href="/careers/{{$career->id}}/edit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('careers.destroy', $career->id)}}" style="display: inline-block;"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-custom btn-delete" onclick="return confirm('Are you sure?')" style="padding: 0px;"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </table>
                @else 
                    <p>No careers found.</p>
                @endif
        </div>
        <div class="dashboard-block">
            <div class="pagination">
                {!! $careers->links('partials.pagination'); !!}
                <small class="page">page {{$careers->currentPage()}} of {{$careers->lastPage()}}</small>
            </div>
        </div>
    </div>
</div>
@endsection