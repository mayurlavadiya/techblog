@extends('layouts.master')

@section('title','Techblog Setting')
@section('content')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Website Settings</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Settings</li>
    </ol>
    
    <div class="row mt-3">
        <div class="com-md-12">
            @if(session('message'))
                <h4 class="alert alert-danger">{{session('message')}}</h4>
            @endif
            <div class="card">                
                <div class="card-body">

                    <form action="{{ url('admin/settings')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <b><label>Website Name</label></b>
                            <input type="text" name="website_name" class="form-control" @if($setting) value="{{ $setting->website_name }}" @endif required />
                        </div>

                        <div class="mb-3">
                            <b><label>Website Logo</label></b>
                            <input type="file" name="website_logo" class="form-control"/>
                            @if($setting)
                                <img src="{{ asset('upload/settings/'.$setting->logo) }}" width="20%" height="25%" alt="">
                            @endif
                        </div>

                        <div class="mb-3">
                            <b><label>Website Favicon</label></b>
                            <input type="file" name="website_favicon" class="form-control" />
                            @if($setting)
                            <img src="{{ asset('upload/settings/'.$setting->favicon)}}" width="100px" height="100px" alt="">
                        @endif
                        </div>

                        <div class="mb-3">
                            <b><label>Description</label></b>
                            <textarea name="description" class="form-control" rows="3"> @if($setting) {{ $setting->description }} @endif</textarea>
                        </div>

                        <div class="mb-3">
                            <b><label>Meta Title</label></b>
                            <input type="text" name="meta_title" class="form-control" @if($setting) value="{{ $setting->meta_title }}" @endif/>
                        </div>

                        <div class="mb-3">
                            <b><label>Meta Keyword</label></b>
                            <textarea name="meta_keyword" class="form-control" rows="3"> @if($setting) {{ $setting->meta_keyword }} @endif</textarea>
                        </div>

                        <div class="mb-3">
                            <b><label>Meta Description</label></b>
                            <textarea name="meta_description" class="form-control" rows="3">@if($setting) {{ $setting->meta_description }} @endif</textarea>
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