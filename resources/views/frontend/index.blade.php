@section('title', 'Techblog - Home')
@extends('layouts.app')


@section('content')

    <style>
        .blog-image {
            width: 70px;
            height: 185px;
            object-fit: cover;
            object-position: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(143, 24, 24, 0.1);
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-body {
            flex-grow: 1;
            margin-bottom: 25px;
        }

        @media (max-width: 767px) {
            .card {
                height: auto;
            }
        }
    </style>

    {{-- <div class="container">
    <h2 class="card-title">Blog Posts</h2>
    <hr>
    <div class="row">
        @foreach ($posts as $post)
            @if ($post->status == '1')
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
</div> --}}

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel category-carousel owl-theme">
                    @foreach ($all_categories as $all_cat_item)
                        <div class="item">
                            <a href="{{ url('categories/' . $all_cat_item->slug) }}" class="text-decoration-none">
                                <div class="card">
                                    <img src="{{ asset('upload/category/' . $all_cat_item->image) }}"
                                        class="card-img-top blog-image" alt="Post Image">
                                    <div class="card-body text-center">
                                        <h5 class="text-dark">{{ $all_cat_item->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>TechBlog</h3>
                    <div class="underline">
                    </div>
                    <p>
                        Welcome to TechBlog, your ultimate destination for all things tech-related. Our mission is to
                        provide you with the latest news, updates, tips, and insights from the world of technology. Whether
                        you're a tech enthusiast, a professional in the industry, or simply someone curious about the latest
                        gadgets and innovations, TechBlog is here to keep you informed and inspired.</p>
                    <p>
                        At TechBlog, we strive to deliver high-quality content that covers a wide range of topics, including
                        smartphones, computers, artificial intelligence, cybersecurity, software, and much more. Our team of
                        dedicated tech enthusiasts and industry experts work tirelessly to bring you informative articles,
                        reviews, tutorials, and in-depth analysis to help you stay ahead in the fast-paced world of
                        technology.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>


    @include('layouts.include.fronted-footer')
@endsection
