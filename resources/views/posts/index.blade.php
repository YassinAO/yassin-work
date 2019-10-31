@extends('layouts.blog')

@section('content')

<section id="posts">
    <div class="container">    
        <div class="post-container whitespace">
    
            @foreach($posts as $post)
                <div class="posts-block">
                    <a href="/posts/{{$post->id}}">
                    <div class="thumbnail">
                        <i class="fas fa-eye"></i>
                        <img src="/storage/cover_images/posts/{{$post->cover_image}}" alt="" width="100%">
                    </div>
                    <div class="description">
                        <h5>{{$post->title}}</h5>
                        <p>{{$post->description}}</p>
                        <small class="date">Published on - {{$post->created_at->format('F Y')}}</small>
                    </div>
                    </a>
                    <div class="tags">
                        @foreach ($post->tags as $tag)
                            <span class="tag" style="background-color: #{{$tag->color}}">{{ $tag->title }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
            