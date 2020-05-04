<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class StoriesController extends Controller
{
    public function allStories() 
    {
        $posts = Post::where('mode', 'public')->latest()->paginate(20);
       
        return view('allstories')->with(['posts' => $posts ]);
    }

    public function newStories() 
    {

    /** Displays the most recent 10 posts */
        $posts = Post::where('mode', 'public')->latest()->take(10)->get();
        
        return view('newstories')->with(['posts' => $posts ]);
    }
}
