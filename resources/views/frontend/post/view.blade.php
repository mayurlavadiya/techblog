@extends('layouts.app')
@section('title', 'Post')
@section('content')

    @auth
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary mb-4" href="{{ url()->previous() }}">Back</a>
                    <div class="category-heading">
                        <h3 style="font-weight:bold;">Title :    {!! $post->name !!}</h3>
                    </div>

                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <div class="mt-3">
                                <h5 style="color:crimson; font-weight:bold; text-decoration:underline;">Category Name :</h5>
                                {{ $post->category->name }}
                            </div>
                            <div class="mt-3">
                                <h5 style="color:crimson; font-weight:bold; text-decoration:underline;">Post Description:
                                </h5>
                                {!! $post->description !!}
                            </div>

                            <div class="mt-3">
                                <img src="{{ asset('upload/post/' . $post->image) }}" width="50%" height="50%"
                                    alt="cimage">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2>
                                {{ __('Login or Register') }}
                            </h2>   
                        </div>
                        <div class="card-body">
                            <p>{{ __('Please log in or register to view the post details.') }}</p>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary mr-3" href="{{ route('login') }}">{{ __('Login') }}</a> &nbsp;
                                <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth

@endsection
