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

        /**
         * In the allstories.blade.php file, there is a form that accepts the text a user wants to search for.
         * 
         * The form has an input field with a name attribute called 'search'
         * 
         * A post request is passed to this method and used to run the search funtionality
         * 
        */

        $search = Post::search($request['search'])->get();
       
        return view('allstories')->with(['posts' => $posts, 'search' => $search ]);
    }

}
