<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'post_id',
        'user_id',
        'comment_body'
    ];

    public function post(){
        return $this->belongsTo(Post::class,'post_id','id'); // post id is foreign  & id is primary
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id'); // user id is foreign key of User table & id is primary for comment
    }
}
