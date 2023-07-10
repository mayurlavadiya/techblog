    @extends('layouts.master')

    @section('title','Update Post')
    @section('content')
        
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Post</h1>
        <a href="{{url('admin/posts')}}" class="btn btn-primary btn-md float-end">View Post</a>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Blog Post </li>
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

                <form action="{{url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <b><label for="">Select Category</label></b>
                        <select name="category_id" class="form-control">
                            <option value="">-- Select Category --</option>
                            @foreach ($category as $cateitem)                             
                                <option value="{{$cateitem->id}}" {{$post->category_id == $cateitem->id ? 'selected':''}}>
                                    {{$cateitem->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <b><label for="">Post Name</label></b>
                        <input type="text" name="name" class="form-control" value="{{$post->name}}">
                    </div>
                    <div class="mb-3">
                        <b><label for="">Slug</label></b>
                        <input type="text" name="slug" class="form-control" value={{$post->slug}}>
                    </div>
                    <div class="mb-3">
                        <b><label for="">Description</label></b>
                        <textarea name="description" id="mySummernote" class="form-control">{!!$post->description!!}</textarea>
                    </div>
                    <div class="mb-3">
                        <b><label for="">Image</label></b>
                        <input type="file" name="image" class="form-control" value={{$post->image}}><br>
                        <img src="{{asset('upload/post/'.$post->image)}}" width="100px" height="70px" alt="cimage">
                    </div>

                    <h6>SEO TAG</h6>
                    <div class="mb-3">
                        <b><label for="">Meta Title</label></b>
                        <input type="text" name="meta_title" class="form-control" value={{$post->meta_title}}>
                    </div>
                    <div class="mb-3">
                        <b><label for="">Meta Description</label></b>
                        <textarea name="meta_description" class="form-control" >{!!$post->meta_description!!}</textarea>
                    </div>
                    <div class="mb-3">
                        <b><label for="">Meta Keywords</label></b>
                        <textarea name="meta_keyword" class="form-control" >{!!$post->meta_keyword!!}</textarea>
                    </div>

                    <h6>STATUS MODE</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <b><label for="">Navbar Status</label></b>
                            <input type="checkbox" name="navbar_status" {{$post->navbar_status == '1' ? 'checked':''}} />
                        </div>
                        <div class="col-md-3 mb-3">
                            <b><label for="">Status</label></b>
                            <input type="checkbox" name="status" {{$post->status == '1' ? 'checked':''}}/>
                        </div>                    
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update post</button>
                    </div>
                    
                </form>    
            </div>
        </div>
    </div>

    @endsection