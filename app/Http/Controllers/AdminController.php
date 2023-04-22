<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {   
        $posts = Post::latest()->paginate(4);
        return view('admin', compact('posts'));
    }
}
