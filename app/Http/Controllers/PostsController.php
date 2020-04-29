<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware('auth');
    }

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
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required'],
            'coverPhoto' => ['image', 'nullable', 'max:1999'],
            'story' => ['required'],
            'mode' => ['required'],
            'tags' => ['nullable']
        ]);

        if ($request->hasFile('coverPhoto')) {
            //get file name with extension
            $fileNameWithExt = $request->file('coverPhoto')->getClientOriginalName();
            //Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('coverPhoto')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image
            $request->file('coverPhoto')->storeAs('public/coverPhotos', $fileNameToStore); 
        }
        Post::create([
            'title' =>$request['title'],
            'story' => $request['story'],
            'mode' => $request['mode'],
            'tags' => $request['tags'],
            'coverPhoto'=>$fileNameToStore,
            'user_id'=> auth()->user()->id,
        ]);
        return redirect(route('posts.create'))->with('success', 'New post added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show')->with(['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
