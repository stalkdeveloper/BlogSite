<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        
        $input = $request->all();
        //$input = Post::withCount(['comments']);
        $request->validate([
            'comment'=>'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);
        return back();
    }

}
