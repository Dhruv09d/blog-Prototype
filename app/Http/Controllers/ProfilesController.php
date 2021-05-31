<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Follower;
use App\Models\Following;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {   //dd($user_id);
        $user_login_info = User::where('id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        if($profile !== NULL) {
            return view('profiles.profile_index')->with('profile', $profile)->with('loggedin_user', $user_login_info)->with('posts', Post::where('user_id', $user_id)->orderByDesc('created_at')->get())->with("followers", Follower::where('user_id', $user_id )->get())->with("followings", Following::where('user_id', $user_id )->get());
        } else {
            return redirect()->route('profile.create', ['user_id' => Auth::user()->id]);
        }
        
    }

    /**
     * Show the form for creating a profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {   
        $user_login_info = User::where('id', $user_id)->first();
        return view('profiles.profile_create')->with('loggedin_user', $user_login_info);
    }

    /**
     * Store a newly created profile in storage.
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
        return redirect()->route('profile.index', ['user_id' => Auth::user()->id])->with('message', $msg);
    }

    /**
     * Display all profiles.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('profiles.profile_view')->with('profiles', Profile::all());
    }

    /**
     * Show the form for editing the profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {   
        $about = Profile::where('user_id', $user_id)->first();
        $user_login_info = User::where('id', $user_id)->first();
        return view('profiles.profile_update')->with('loggedin_user', $user_login_info)->with('about_info', $about);
    }

    /**
     * Update the specified profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $msg = "no action performed yet!";
        if($request->input('form_name') == 'user_table_update') {
            User::where('id', $id)->update([
                'name' => $request->input('user_name'),
                'email' => $request->input('email'),
            ]);
            $msg = "User's name and email has been updated";
        }
        else if ($request->input('form_name') == 'createAboutSection') {
            Profile::where('user_id', $user_id)->update([
                'biography' => $request->input('bio'),
                'instagram' => $request->input('instagram'),
                'facebook' => $request->input('facebook'),
                'twitter' => $request->input('twitter'),
            ]);
            $msg = "About info has been updated";
        }
        else if ($request->input('form_name') == 'changePassword') {
            
            $currentPass = $request->input('currentPass');
            $newPass = $request->input('newPass');
            $confNewPass = $request->input('confNewPass');
            //dd($confNewPass, $newPass, strcmp("asd", "asd"));
            //dd(Hash::check($currentPass, $currentPassInsideDB->password));
            $currentPassInsideDB = User::where('id', $user_id)->first();
            if(Hash::check($currentPass, $currentPassInsideDB->password)) {
                //strcmp() return 0 when string matches
                if(strcmp($newPass, $confNewPass) == 0) {
                    $newPass = Hash::make($newPass);
                    User::where('id', $user_id)->update([
                        'password' => $newPass,
                    ]);
                    $msg = "Password has been updated";
                } else {
                    $msg ="Both new password should be same";
                    //return redirect('profiles')->with("message", $msg);
                }
            } else {
                $msg ="Forgot password?";
            }
        }

        return redirect('profiles')->with("message", $msg);
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
