<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit($user_id){
        $user = User::find($user_id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $data = $request->validated();
        $user = User::find($user_id);

        $user->id = $data['id'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->description = $data['description'];
        $user->created_at = $data['created_at'];
        $user->status = $request->status == true ? '1':'0';
        $user->created_by = Auth::user()->id;
        $user->update();

        return redirect('admin/posts')->with('message', 'Post Updated Successfully..');        
    }


}
