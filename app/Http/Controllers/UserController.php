<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->isadmin){
            abort(404);
        }
        return view('back.usercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();


        return view('back.userlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user()->isadmin){
            abort(404);
        }
        $user = User::findOrFail($id);
        return view('back.useredit', [ 'user' => $user ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        

        if(request('file') != null){
            $uuid = Str::uuid()->toString();
            $path = 'app/'.request('pic')->storeas('postpic', $uuid.".jpg");
            User::where('id',$id)->update([
                'pic'=>$path,
            ]);
        }
        if(request('password') !== null){
            User::where('id',$id)->update([
                'password'=>request('password')
            ]);
        }
        
        User::where('id',$id)->update([
            'name'=>request('name'),
            'username'=>request('username'),
            'email'=>request('email'),
            'phone'=>request('phone'),
            'isadmin'=>request('isadmin'),
            'verified'=>request('verified')
        ]);

        return redirect()->route('adminpanel.userlist');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back();
    }

    public function allusers()
    {
        if(!Auth::user()->isadmin){
            abort(404);
        }
        $users = User::all();
        return view('back.userlist', [ 'users' => $users ]);
    }
}
