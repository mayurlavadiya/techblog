<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    // view fronted category page
    public function viewCategoryPost($category_slug)
    {
        $category = Category::where('slug',$category_slug)->where('status','1')->first();
        
        if($category){
            $post = Post::where('category_id',$category->id)->where('status','1')->paginate(1);    
            return view('frontend.post.index', compact('post','category'));
        }
        else
        {
        return redirect('/');            
        }
        
    }
}
