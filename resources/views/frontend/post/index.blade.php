@extends('layouts.app')

@section('title',"$category->meta_title")
@section('meta_description',"$category->meta_description")
@section('meta_keyword',"$category->meta_keyword")

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">   
            <div class="col-md-12">
                <a class="btn btn-primary mb-4" href="{{ url()->previous() }}">Back</a>

                <div class="category-heading">
                    <h3><b>Category :</b> &nbsp;{{$category->name}}</h3>
                </div>

                @forelse ($post as $postitem)  
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <a style="text-decoration: none" href="{{ url('categories/'. $category->slug .'/'. $postitem->slug) }}">
                            <h2 class="post-heading">{{$postitem->name}}</h2>
                        </a>

                        <h6>
                            <b>Posted on:</b> {{$postitem->created_at->format('d-m-Y')}}
                            <span class="ms-5"><b>Posted by:</b> {{$postitem->user?->name}}</span>
                        </h6>
                    </div>
                </div>
                <div class="your-paginate mt-4">
                    {{$post->links()}}
                </div>

                @empty
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h3>No Post Available..!</h3>
                    </div>
                </div>
                    
                @endforelse
            </div>
           
        </div>
    </div>
</div>


@include('layouts.include.fronted-footer')

@endsection