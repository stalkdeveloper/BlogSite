<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'parent_id', 'comment'];

public function post()
 {
 return $this->belongsTo(Post::class);
 }

 public function user()
 {
 return $this->belongsTo(User::class, 'user_id', 'id');
 }

 public function replies(){
    return $this->hasMany(Comment::class, 'parent_id');
 }
 
}
