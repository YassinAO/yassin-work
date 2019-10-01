@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="dashboard-container">
        <div class="dashboard-block">
            <h2>Posts overview</h2>
            <a href="/posts/create" class="btn-custom btn-create"><i class="fas fa-plus"></i></a>
        </div>
        <div class="dashboard-block">
                @if(count($posts) > 0 )
                <table>
                    
                    <thead>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Last modified</th>
                        <th>Actions</th>
                    </thead>
                        
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>Python</td>
                            <td>{{date('d-m-Y', strtotime($post->updated_at))}}</td>
                            <td>
                                <a href="/posts/{{$post->id}}" class="btn-custom btn-view"><i class="fas fa-eye"></i></a>
                                <a href="/posts/{{$post->id}}/edit" class="btn-custom btn-edit"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('posts.destroy', $post->id)}}" style="display: inline-block;"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-custom btn-delete" onclick="return confirm('Are you sure?')" style="padding: 0px;"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </table>
                @else 
                    <p>No posts found.</p>
                @endif
        </div>
        <div class="dashboard-block">
            <div class="pagination">
                {!! $posts->links('partials.pagination'); !!}
                <small class="page">page {{$posts->currentPage()}} of {{$posts->lastPage()}}</small>
            </div>
        </div>
    </div>
</div>
@endsection