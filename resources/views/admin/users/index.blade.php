@extends('layouts.master')

@section('title','View Users')
@section('content')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">View User Details </li>
    </ol>
    
    <div class="card">
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
            <table id="myDatatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)                        
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name }}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_as == '1' ? 'Admin':'User'}}</td>
                        <td>
                            <a href="{{url('admin/users/edit/'.$user->id)}}" class="btn btn-success">Edit</a>
                            {{-- <a href="{{url('admin/delete-post/'.$user->id)}}" class="btn btn-danger">Delete</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection