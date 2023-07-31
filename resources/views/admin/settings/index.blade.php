@extends('layouts.master')

@section('title','Techblog Setting')
@section('content')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    
    <div class="row mt-3">
        <div class="com-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Website Settings</h1>
                </div>
                <div class="card-body">

                    <form action="{{ url('admin/settings')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Website Name</label>
                            <input type="text" name="website_name" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label>Website Logo</label>
                            <input type="file" name="website_logo" class="form-control" required/>
                        </div>

                        <div class="mb-3">
                            <label>Website Favicon</label>
                            <input type="file" name="website_favicon" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Meta Keyword</label>
                            <textarea name="meta-keyword" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta-description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
@endsection