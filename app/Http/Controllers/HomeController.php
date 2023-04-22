<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class HomeController extends Controller
{
    public function show_post()
    {
        $posts = cache()->remember('home-posts', 60*60*24, function(){
        return Post::latest()->paginate(5);
       });
        return view('home', ['posts' => $posts]);
    }
}
