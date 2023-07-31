<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('message', 'Add comments and try!');
            }

            $post = Post::where('slug', $request->post_slug)->where('status', '1')->first();
            if ($post) {
                Comments::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);

                return redirect()->back()->with('message', 'Comment added successfully !');
            } else {
                return redirect()->back()->with('message', 'No such post found !');
            }
        } else {
            return redirect('login')->with('message', 'Login first to add comments !');
        }
    }

    public function destroy(Request $request)
    {
        if (Auth::check()) {
            $comment = Comments::where('id',$request->comment_id)
                ->where('user_id',Auth::user()->id)
                ->first();

            if($comment){
                $comment->delete(); 
                return response()->json([
                    'status' => 200,
                    'message' => 'Comment deleted successfully !'
                ]);
            }    
            else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong !'
                ]);
            }
        }
        else
        {
            return response()->json([
                'status' => 401,
                'message' => 'Login to delete this comment !'
            ]);
        }
    }
}
