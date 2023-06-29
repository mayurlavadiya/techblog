<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('admin.post.index');
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store()
    {
        return view('admin.post.create');
    }

    public function edit($post_id)
    {
        return view('admin.post.create');
    }

    public function update()
    {
        return view('admin.post.create');
        
    }
}
