<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment_text' => 'required|string',
            'post_id' => 'required|integer|exists:posts,id',
        ]);

        $post = Post::find($request->input('post_id'));
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => strip_tags($request->input('comment_text')),
        ]);

        return redirect('/posts/'.$post->id);
    }
}
