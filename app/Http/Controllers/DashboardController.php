<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){

      //  dd(auth()->user());
       // dd(auth()->user()->name);
      // dd(auth()->user()->posts);
     // dd(Post::find(2)->created_at);//carbon date time manipulation
      //dd(Post::find(2));//get a single post by id

     

        return view('dashboard');
    }
}
