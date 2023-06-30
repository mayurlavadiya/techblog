<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    } 

    public function create()
    {
        $category = Category::where('status','1')->get();
        return view('admin.post.create', compact('category'));
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();
        $post = new Post;

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getclientOriginalExtension();
            $file->move('upload/post/', $filename);
            $post->image = $filename;
        }

        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;
        $post->save();

        return redirect('admin/posts')->with('message', 'Post Added Successfully..');
    }

    public function edit($post_id)
    {
        $category = Category::where('status','1')->get();
        $post = post::find($post_id);
        return view('admin.post.edit', compact('post','category'));
    }

    public function update()
    {
        return view('admin.post.create');
        
    }

    public function delete($category_id){
        $posts = Post::findOrFail($post_id);
        if($posts){
             $destination = 'upload/post/'.$posts->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $posts->delete();
            return redirect('admin/post')->with('message', 'Post Deleted Successfully..');
        }
        else{
            return redirect('admin/post')->with('message', 'No Post ID Found..');
        }
    }
}