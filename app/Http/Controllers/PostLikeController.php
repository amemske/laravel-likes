<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function store(Post $post, Request $request){ //get the post whose id is xyz

       // dd($post->likes()->withTrashed()->get()); //checking deleted items

        $this->middleware('auth'); // add auth middleware, prevent unauthenticated users accessing the site
       // dd($post);
      //; //check if authenticated user liked post
       $post->likes()->create([
        'user_id' => $request->user()->id
       ]);

     //only send this email if a previous like has not been created


if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){

    Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
}


       return back();
    }

    public function destroy(Post $post, Request $request)
    {
       //dd($post);
       //get the like of a specific user
       //where the 'post_id' is the same as $post->id
       //delete
       $request->user()->likes()->where('post_id', $post->id)->delete();
       return back();
    }
}
