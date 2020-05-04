<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class DraftsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //contains all the drafts by a particular user
        $posts = auth()->user()->post->where('mode', 'Private');
        
        return view('drafts.index')->with(['posts' => $posts ]);
    }
}
