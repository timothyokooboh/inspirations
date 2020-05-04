<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use DB;

class FollowsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store($id)
    {
        $user = User::findOrFail($id);
        return auth()->user()->following()->toggle($user->profile);
    }

    public function followers()
    {
        $followers = DB::table('profile_user')->where('profile_id', auth()->user()->profile->id)->get();
    
        return view('follows.followers')->with(['followers' => $followers]);
    }

    public function following()
    {
        $followings = DB::table('profile_user')->where('user_id', auth()->user()->id)->get();
        //dd($followings);
        
        return view('follows.following')->with(['followings' => $followings]);
    }
}
