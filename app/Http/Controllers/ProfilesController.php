<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfilesController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::findOrFail($id);

        $follows = (auth()->user()) ? auth()->user()->following->contains($profile->id) : false;

        //dd($follows);
        
        return view('profiles.show')->with(['profile' => $profile, 'follows' => $follows]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);

        if (auth()->user()->profile->id !== $profile->id) {
           return redirect(route('home'))->with('error', 'UNAUTHORIZED ACCESS');
        } else {
            return view('profiles.edit')->with(['profile' => $profile]);
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
            'firstName' => ['string', 'nullable', 'max:255'],
            'lastName' => ['string', 'nullable', 'max:255'],
            'country' => ['string', 'nullable', 'max:255'],
            'state' => ['string', 'nullable', 'max:255'],
            'profilePicture' => ['image', 'nullable', 'max:1999']
        ]);
 
        //handle file upload
        if ($request->hasFile('profilePicture')) {
 
            //Get file name with extension
         
            $fileNameWithExt = $request->file('profilePicture')->getClientOriginalName(); 
         
            //Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
         
            //Get just extension
            $extension = $request->file('profilePicture')->getClientOriginalExtension(); 
         
            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
         
            //upload image
            $request->file('profilePicture')->storeAs('public/profilePictures', $fileNameToStore);
        } 

        $profile = Profile::findOrFail($id);
          $profile->firstName = $request['firstName'];
          $profile->lastName = $request['lastName'];
          $profile->phone = $request['phone'];
          $profile->country = $request['country'];
          $profile->state = $request['state'];
        if ($request->hasFile('profilePicture')) {
            Storage::delete('public/profilePictures/'.$profile->profilePicture);
            $profile->profilePicture = $fileNameToStore;
        }
            
          $profile->save();
 
        return redirect(route('home'))->with('success', 'Profile updated successfully');

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
