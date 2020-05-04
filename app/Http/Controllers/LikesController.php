<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class LikesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store($id)
    {
        $post = Post::findOrFail($id);

        return auth()->user()->liking()->toggle($post);
    }
}

