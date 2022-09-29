<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{

    private $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    public function index()
    {
        $posts = $this->post->with('comments')->paginate();
        
        return view('posts.index', compact('posts'));
    }


    public function show($id)
    {
        $post = $this->post->with(['comments.user','user'])->find($id);
       // $author = $post->user;

        return view('posts.show', compact('post'));

    }
}
