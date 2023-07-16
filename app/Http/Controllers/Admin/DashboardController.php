<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::count();
        $post = Post::count();
        $users = User::where('role_as','0')->count();
        $admins = User::where('role_as','1')->count();
        return view('admin.dashboard',compact('categories','post','users','admins'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
