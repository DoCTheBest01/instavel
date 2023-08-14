<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Posts::select('*')->orderBy('created_at', 'desc')->get();
        return view('welcome', ['posts' => $posts]);
    }

    public function show($username)
    {
        $user = User::select()->where('username', '=', $username)->first();
        
        if(!isset($user->id)){
            abort(404);
        }
        $posts = Posts::select()->where('creator', '=', $user->id)->latest()->orderBy('created_at', 'desc')->get();

        // return $posts;
        return view('creatorchannel', ['posts' => $posts, 'user' => $user]);
    }
    
}