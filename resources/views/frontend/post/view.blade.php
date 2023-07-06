@extends('layouts.app')
@section('title','Post')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="category-heading">
                    <h3>{!!$post->name!!}</h3>
                </div>
                <div class="mt-3">
                    <h6>Category Name : {{$post->category->name}}</h6>
                </div>

                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        {!!$post->description!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
