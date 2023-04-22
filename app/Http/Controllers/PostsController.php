<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

   public function __construct(){

    $this->middleware(['auth'])->only(['store', 'destroy']); //sign in to post or delete a post

    }


    public function index(){
//display
       //$posts = Post::get(); //all posts collection
       $posts = Post::with(['user', 'likes'])->orderByDesc('created_at')->paginate(20); //get 3 paginated posts in descending order

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function showSinglePost(Post $post){
        return view('posts.show', [ //pass down $post to be used in the view
            'post' => $post
        ]);

    }

    public function store(Request $request){
        //validate
        $this->validate($request, [
            'body' => 'required',
        ]);

        //store
        //this is possible because of the relationship set in User.php

       /*  $request->user()->posts()->create([
            'body' => $request->body
        ]); */

        $request->user()->posts()->create($request->only('body'));

        return back();

    }

    public function destroy(Post $post) {
       // dd($post);
       //use postpolicy to delete
       //delete the post
       //return back
       $this->authorize('delete', $post);
       
       $post->delete();

       return back();

    }
    
}
