@section('title', 'Techblog - Home')
@extends('layouts.app')

@section('content')

<style>
   .blog-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    object-position: center;
}
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 6px rgba(143, 24, 24, 0.1);
    }
    
    @media (max-width: 767px) {
        .card {
            height: auto;
        }
    }
</style>

<div class="container">
    <h2 class="card-title">Blog Posts</h2>
    <hr>
    <div class="row">
        @foreach($posts as $post)
            @if($post->status == '1')
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <a href="{{ url('categories/'. $post->category->slug .'/'. $post->slug) }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ asset('upload/post/' . $post->image) }}" class="card-img-top blog-image" alt="Post Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->name }}</h5>
                                <p class="p1">Created by: {{ $post->user?->name }}</p>
                                <p class="p1">{{ $post->created_at->format('F j, Y') }}</p>
                                <p class="card-text text-muted">{{ $post->content }}</p>
                                <div class="d-flex justify-content-between">
                                    <p class="m-0">Likes: {{ $post->likes }}</p>
                                    <p class="m-0">Comments: {{ $post->comments }}</p>
                                    <p class="m-0">Shares: {{ $post->shares }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                    
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>


@include('layouts.include.fronted-footer')
@endsection
