<?php 
namespace App\Http\Controllers;  

use Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use App\Events\PostCreated;
use App\Http\Resources\PostCollection;
use App\Mail\AdminMail;
use App\Mail\UserMail;

class PostController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::with('users')->latest()->paginate(5);
        return view('posts.index',compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
        // return response()->json([
        //     'data' => $posts,
        //     'message' => 'Success : All Post Visible',
        // ]);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        return view('posts.create');
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'body'=>'required',
        ]); 

        $input = $request->all();  
        $input['user_id'] = Auth()->user()->id;
        Post::create($input);

        // return response()->json([
        //     "status" => "Success",
        //     "message" => "Post created successfully - Go and Check.",
        // ]);

        $data = ['title'=>$input['title'], 'author'=>Auth()->user()->firstname, 'message' => 'New Post Publish..!!',];
        event(new PostCreated($data));
        
        return redirect()->route('posts.index')->with('success','Post created successfully.');
        
        // return response()->json([
        //     "status" => $input,
        //     "message" => "Post created successfully - Go and Check.",
        // ]);
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function show(Post $post)
    {
        $total = $post->comments()->count();
        return view('posts.show',compact('post', 'total'));
        // return response()->json([
        //     "status" => $post,
        //     "message" => "Post successfully Show -  Check.",
        // ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'body'=>'required',
        ]);

        $input = $request->all();         

        $post->update($input);

        $data = ['title'=>$input['title'], 'author'=>Auth()->user()->firstname, 'message' => 'This post an edited..!!',];
        event(new PostCreated($data));

        return redirect()->route('posts.index')->with('success','Post updated successfully');
        
        // return response()->json([
        //     "status" => $input,
        //     "message" => "Post updated successfully - Go and Check.",
        // ]);
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $data = ['title'=>$post['title'], 'author'=>Auth()->user()->firstname, 'message' => 'So sorry, This post has been deleted by an Admin.!!',];
        event(new PostCreated($data));
        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }

    // public function authorWisePosts(User $user)
    // {
    //     return view('posts.author-wise-post', compact('user'));
    // }
  
}