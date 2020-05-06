<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class StoriesController extends Controller
{
    public function allStories(Request $request) 
    {
        $posts = Post::where('mode', 'public')->latest()->paginate(20);

        $search = Post::search($request['search'])->get();
       
        return view('allstories')->with(['posts' => $posts, 'search' => $search ]);
    }

}
