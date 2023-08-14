<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Posts;


class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($url)
    {
        $post = Posts::where('url', $url)->firstOrFail();

        return view('post', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $path = 'app/'.request('pic')->storeas('postpic', $uuid.".jpg");

        $post = new Posts();
        
        $post->title = request('title');
        $post->pic = $path;
        $post->description = request('description');
        $post->creator = Auth::id();
        $post->url = $uuid;

        $post->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $posts = Posts::select()->where('creator', '=', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('list', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Posts::findOrFail($id);

        return view('postedit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if(request('file') != null){
            $uuid = Str::uuid()->toString();
            $path = 'app/'.request('pic')->storeas('postpic', $uuid.".jpg");
            Posts::where('id',$id)->update([
                'pic'=>$path,
            ]);
        }

        
        Posts::where('id',$id)->update([
            'title'=>request('title'),
            'description'=>request('description')
        ]);
        
        return redirect('/postlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findOrFail($id)->delete();
        return back();
    }

    public function admincreate()
    {
        if(!Auth::user()->isadmin){
            abort(404);
        }
        return view('back.createpost');
    }

    public function adminstore()
    {
        $uuid = Str::uuid()->toString();
        $path = 'app/'.request('pic')->storeas('postpic', $uuid.".jpg");

        $post = new Posts();
        
        $post->title = request('title');
        $post->pic = $path;
        $post->description = request('description');
        $post->creator = Auth::id();
        $post->url = $uuid;

        $post->save();
        return redirect('/');
    }

    public function adminallposts()
    {
        if(!Auth::user()->isadmin){
            abort(404);
        }
        $posts = Posts::all();
        return view('back.allposts', ['posts' => $posts]);
    }
    
}
