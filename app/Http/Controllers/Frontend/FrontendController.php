<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $posts = Post::all(); 
        return view('frontend.index',compact('posts'));
    }

    // view fronted category page
    public function viewCategoryPost($category_slug)
    {
        $category = Category::where('slug',$category_slug)->where('status','1')->first();
        
        if($category){
            // $post = Post::where('category_id',$category->id)->where('status','1')->get();    
            $post = Post::where('category_id',$category->id)->where('status','1')->paginate(3);    
            return view('frontend.post.index', compact('post','category'));
        }
        else
        {
        return redirect('/');            
        }        
    }

    public function viewPost(string $category_slug, string $post_slug){
        $category = Category::where('slug',$category_slug)->where('status','1')->first();
        
        if($category){
            // $post = Post::where('category_id',$category->id)->where('status','1')->get();    
            $post = Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status','1')->first();    
            return view('frontend.post.view', compact('post'));
        }
        else
        {
        return redirect('/');            
        }        
    }

    public function show($id)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // User is logged in, retrieve the post
            $post = Post::findOrFail($id);

            // Return the view with the post data
            return view('post.show', compact('post'));
        }

        // User is not logged in, redirect to login page
        return redirect()->route('login')->with('error', 'Please log in to view the post details.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
