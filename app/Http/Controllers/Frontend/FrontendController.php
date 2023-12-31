<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $setting = Settings::find(1);
        $posts = Post::all(); 
        $all_categories = Category::where('status','1')->get();
        $latest_post = Post ::where('status','1')->orderBy('created_at','DESC')->get()->take(5);
        return view('frontend.index',compact('posts', 'all_categories','latest_post','setting'));
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
            $latest_post = Post::where('category_id',$category->id)->where('status','1')->orderBy('created_at','DESC')->get()->take(5);    
            return view('frontend.post.view', compact('post','latest_post'));
        }
        else
        {
        return redirect('/');            
        }        
    }

    public function show($id)
    {
        if (auth()->check()) {
            // User is logged in, retrieve the post
            $post = Post::findOrFail($id);

            // Return the view with the post data
            return view('post.show', compact('post'));
        }

        // User is not logged in, redirect to login page
        return redirect()->route('login')->with('error', 'Please log in to view the post details.');
    }

    public function articles()
    {
        return view('frontend.navbar_pages.articles');
    }

    public function blog()
    {
        $posts = Post::where('status', '1')->get();
        return view('frontend.navbar_pages.blog', compact('posts'));
    }

    public function contactus()
    {
        return view('frontend.navbar_pages.contactus');
    }

    public function aboutus()
    {
        return view('frontend.navbar_pages.aboutus');
    }

    public function services()
    {
        return view('frontend.navbar_pages.services');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
