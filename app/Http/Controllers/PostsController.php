<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Profile;
use App\Post;
use App\Comment;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware('auth')->except('show');
    }

    public function index()
    {
        //contains all the published posts (public mode) by a particular user
        
        $posts = Post::where([ 'user_id' => auth()->user()->id, 'mode' => 'Public' ])->latest()->get();
        
        return view('posts.index')->with(['posts' => $posts ]);
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
            'title' => ['required', 'string', 'max:100' ],
            'coverPhoto' => ['image', 'nullable', 'max:2999'],
            'story' => ['required'],
            'mode' => ['required'],
            'tags' => ['nullable', 'string', 'max:255']
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
            'coverPhoto' => $request->hasFile('coverPhoto') ? $fileNameToStore : NULL,
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
       
        $comments = Comment::where('post_id', $post->id)->latest()->get();
        
        $profileID = $post->user->profile->id;
        
        $follows = (auth()->user()) ? auth()->user()->following->contains($profileID) : false;

        $postID = $post->id;
        
        $likes = (auth()->user()) ? auth()->user()->liking->contains($postID) : false;

        //dd($likes);
      
        return view('posts.show')->with(['post' => $post, 'comments' => $comments, 'follows' => $follows, 'likes' => $likes ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if ( $post->user_id !== auth()->user()->id ) {
            return redirect(route('home'))->with(['error' => 'Unauthorized access']);
        } 

        else {
            return view('posts.edit')->with([ 'post' => $post ]);
        }

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
        $this->validate($request, [
            'title' => ['required', 'string', 'max:100' ],
            'coverPhoto' => ['image', 'max:2999', 'nullable'],
            'story' => ['required'],
            'tags' => ['nullable', 'string', 'max:255'],
            'mode' => ['required']
        ]);

        if ($request->hasFile('coverPhoto')) {
            //Get file name with extension
            $fileNameWithExt = $request->file('coverPhoto')->getClientOriginalName();

            //Get just the file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just the extension
            $extension = $request->file('coverPhoto')->getClientOriginalExtension();

            //File name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //upload image
            $request->file('coverPhoto')->storeAs('public/coverPhotos', $fileNameToStore); 

        }

        $post = Post::findOrFail($id);
        $post->title = $request['title'];
        $post->story = $request['story'];
        $post->mode = $request['mode'];
        $post->tags = $request['tags'];
        
        if ( $request->hasFile('coverPhoto') ) {
            Storage::delete('public/coverPhotos/'.$post->coverPhoto);
            $post->coverPhoto = $fileNameToStore ;
        }

        $post->save();

        return redirect(route('posts.edit', ['id' => $post->id]))->with('success', 'New post added');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect(route('home'))->with(['error' => 'Unauthorized access']);
        }
          
        if ($post->coverPhoto !== NULL ){
            //delete image
            Storage::delete('public/coverPhotos/'.$post->coverPhoto);
        }

        $post->delete();

        return redirect(route('home'))->with(['success' => 'One Post deleted successfully']);
    }
}
