@extends('layouts.master')

@section('title','Techblog Admin')
@section('content')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    
    <div class="row mt-3">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-black mb-4">
                <div class="card-body">Total Categories
                    <h2>{{$categories}}</h2>
                </div>                
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-black stretched-link" href="{{url('admin/category')}}">
                        View Details</a>
                    <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-black mb-4">
                <div class="card-body">Total Posts
                    <h2>{{$post}}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-black stretched-link" href="{{url('admin/posts')}}">
                        View Details</a>
                    <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-black mb-4">
                <div class="card-body">Total Users
                    <h2>{{$users}}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-black stretched-link" href="{{url('admin/users')}}">
                        View Details</a>
                    <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-black mb-4">
                <div class="card-body">Total Admin
                    <h2>{{$admins}}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-black stretched-link" href="{{url('admin/users')}}">
                        View Details</a>
                    <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>



    </div>

        
</div>

@endsection