<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    //
     public function index(User $user)
    {
       //grab the currently authenticated user
       //show a list of their posts
       //show a list of their information
       //dd($user);

       //pass down the user

       $posts = $user->posts()->with(['user', 'likes'])->paginate(20); //this are posts from a specific user

       return view('users.posts.index' , [
        'user' => $user,
        'posts'=> $posts
       ]);
    }
}
