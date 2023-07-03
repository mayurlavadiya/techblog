@extends('layouts.master')

@section('title','Post')
@section('content')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Post</h1>
    <a href="{{url('admin/add-post')}}" class="btn btn-primary btn-md float-end">Add Blog Post</a>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">View Blog Post </li>
    </ol>
    
    <div class="card">
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
            <table id="myDatatable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th style="width:20%">Post Name</th>
                        <th style="width:20%">Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)                        
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category->name }}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td> 
                        <td>
                            <img src="{{asset('upload/post/'.$item->image)}}" width="100px" height="70px" alt="cimage">
                        </td>
                        <td style="color: {{$item->status == '1' ? 'green' : 'red'}}; font-weight: bold;">
                            {{$item->status == '1' ? 'Active':'Inctive'}}
                        </td>
                        <td>
                            <a href="{{url('admin/edit-post/'.$item->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{url('admin/delete-post/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection