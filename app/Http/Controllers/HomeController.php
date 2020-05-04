<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postCount = auth()->user()->post->where('mode', 'Public')->count();
        $draftCount = auth()->user()->post->where('mode', 'Private')->count();
        $followersCount = auth()->user()->profile->followers->count();
        $followingCount = auth()->user()->following->count();
        
        return view('home')->with(['postCount' => $postCount, 'draftCount' => $draftCount, 'followersCount' => $followersCount, 'followingCount' => $followingCount]);
    }
}
