<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentFormRequest;
use App\Notifications\PostCommented;

class CommentController extends Controller
{
        public function store(StoreCommentFormRequest $request)
        {

        $comment =  $request->user()->comments()->create($request->all());
        $author = $comment->post->user;

        $author->notify( new PostCommented($comment));


        return redirect()->route('posts.show', $comment->post_id)->withSuccess('Comentário realizado com sucesso');

        }
}
