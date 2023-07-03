@extends('layouts.master')

@section('title','Category')
@section('content')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>
    <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-md float-end">Add Category</a>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">View Blog Category </li>
    </ol>
    
    <div class="card">
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
            <table id="myDatatable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)                        
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <img src="{{asset('upload/category/'.$item->image)}}" width="100px" height="70px" alt="cimage">
                        </td>
                        <td style="color: {{$item->status == '1' ? 'green' : 'red'}}; font-weight: bold;">
                            {{$item->status == '1' ? 'Active':'Inctive'}}
                        </td>
                        <td>
                            <a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection