@extends('layouts.master')

@section('title','Update Users')
@section('content')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Update User</h1>
    <a href="{{url('admin/users')}}" class="btn btn-primary btn-md float-end">View Users</a>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Users </li>
    </ol>
    <div class="row">
        
    </div>

    <div class="card">
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div> 
            @endif

            <form action="{{url('admin/update-user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
             
                <div class="mb-3">
                    <b><label for="">Full Name</label></b>
                    <input type="text" name="name" class="form-control" value={{$user->name}}>
                </div>

                <div class="mb-3">
                    <b><label for="">Email</label></b>
                    <input type="email" name="email" class="form-control" value={{$user->email}}>
                </div>

                <div class="mb-3">
                    <b><label for="">Role As</label></b>
                    <select name="" id="" class="form-control">  
                        <option value="1" {{$user->role_as == '1' ? 'selected':''}}>Admin</option>
                        <option value="0" {{$user->role_as == '0' ? 'selected':''}}>User</option>
                        <option value="2" {{$user->role_as == '2' ? 'selected':''}}>Blogger</option>
                    </select>
                </div>

                <div class="mb-3">
                    <b><label for="">Ceated At</label></b>
                    <input type="text" name="created_at" class="form-control" value={{$user->created_at->format('d/m/Y')}}>
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update user</button>
                </div>
                
            </form>    
        </div>
    </div>
</div>

@endsection