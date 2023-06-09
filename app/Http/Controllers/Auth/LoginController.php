<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']); //only show if you are a guest
    }
    
    public function index(){
        return view('auth.login');
    }
    public function store( Request $request){
        //dd($request->remember);
        //validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            return back()->with('status', 'Invalid login details');//back is same as redirect, with a status message
        }

        return redirect()->route('dashboard');
    }
}
