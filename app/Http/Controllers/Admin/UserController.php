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
    $user = User::findOrFail($user_id);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        // 'role_as' => 'required|in:0,1,2',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->role_as = $request->role_as;
    // $user->status = $request->status == true ? '1':'0';

    $user->update();

    return redirect()->route('admin.users.index')->with('message', 'User updated successfully.');
}



}
