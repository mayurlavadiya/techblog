@extends('layouts.app')
@section('title','View Post')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="category-heading">
                    <h3><b>Category :</b> &nbsp;{{$category->name}}</h3>
                </div>

                @forelse ($post as $postitem)  
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <a style="text-decoration: none" href="{{ url('categories/'. $category->slug .'/'. $postitem->slug) }}">
                            <h2 class="post-heading">{{$postitem->name}}</h2>
                        </a>
                    </div>
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



@endsection