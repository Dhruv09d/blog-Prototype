<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profiles.profile_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {   
        $user_login_info = User::where('id', $user_id)->first();
        return view('profiles.profile_create')->with('loggedin_user', $user_login_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $msg = "Profile about is not updated yet!";
        if($request->input('form_name') == 'createAboutSection') {
            $request->validate([
                'avatar_path' => 'mimes:jpg, png, jpeg | max:5048',
            ]);
            $newImageName = uniqid() . '.' .$request->image->extension();

            //dd($newImageName);
            // moving the image inside public/images  
            $request->image->move(public_path('avatar'), $newImageName);
            // $slug = SlugService::createSlug(Model:class, Slug to store in field, To make slug using field);
            //dd($slug);
        
            Profile::where('id', $user_id)->create([
                'user_id' => $user_id,
                'avatar_path' => $newImageName,
                'biography' => $request->input('bio'),
                'instagram' => $request->input('instagram'),
                'facebook' => $request->input('facebook'),
                'twitter' => $request->input('twitter'),
            ]);
            $msg = "About has been updated successfully!";
        }
        return view('profiles.profile_view')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $msg = "no action performed yet!";
        if($request->input('form_name') == 'user_table_update') {
            User::where('id', $id)->update([
                'name' => $request->input('user_name'),
                'email' => $request->input('email'),
            ]);
            $msg = "User's name and email has been updated successfully";
            

        }
        return view('profiles.profile_view')->with("message", $msg);
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
