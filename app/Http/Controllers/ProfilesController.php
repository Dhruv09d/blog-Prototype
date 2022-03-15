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
use Illuminate\Validation\Rules\Password;
use Image;
// use Illuminate\Support\Facades\Validator;

class ProfilesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['profile_index', 'profile_view']]);
    }

    /**
     * Display profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {   //dd($user_id);
        // dd(Following::where('user_id', $user_id )->get());
        
        $ifUserIsFollowing = null;
        $user_login_info = User::where('id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        $followers = Follower::where('user_id', $user_id)->get();
        $followings = Following::where('user_id', $user_id )->get();
        // dd($user_id, $user_login_info, $profile, $followers, $followings);
        // dd($user_id, $user_login_info, $profile);
        // dd(Auth::user()->id, $loggedin_user->id);
        // dd($profile);
        if ($user_id != Auth::user()->id ) // && !$followers->isEmpty() && !$followings->isEmpty()
            $ifUserIsFollowing = Follower::where([['follower_id', '=' , Auth::user()->id], ['user_id', '=' , $user_id]])->first();
        
        // dd(Auth::user()->id, $user_login_info->id, $ifUserIsFollowing);
        // dd($user_id, $ifUserIsFollowing);
        // dd($user_id,"Followers => ", $followers, " | Following => ", $followings->count());
        // $followers = Follower::where('follower_id', $user_id)->firstOrFail();
        // $followings = Following::where('user_id', $user_id )->firstOrFail();
        if($profile) {
            // if ($followers !== null) {
                return view('profiles.profile_index')->with('profile', $profile)->with('loggedin_user', $user_login_info)->with('posts', Post::where([['user_id', $user_id], ['status', 'Pending']])->orderByDesc('created_at')->get())->with("followers", $followers )->with("followings",$followings)->with("ifUserIsFollowing", $ifUserIsFollowing);
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
            //dd("inside the about create", $user_id);
            $request->validate([
                'image' => 'mimes:jpg, png, jpeg | max:5048',
                'biography' => 'required | max:250',
                'instagram' => 'nullable | max: 200',
                'facebook' => 'nullable | max: 200',
                'twitter' => 'nullable | max: 200',
            ]);
            // dd("inside the about create 2", $user_id);
            if($request->image !== NULL){
                $newImageName = uniqid() .  '-' . $user_id .'.' .$request->image->extension();
                // $request->image->move(public_path('avatar'), $newImageName);
                $img = Image::make($request->image->getRealPath());
                $destination = public_path('avatar');
                $img->resize(220, 220)->save($destination . '/' . $newImageName);
            } else
                $newImageName ="avatar-1299805_640.png";

            //dd($newImageName);
            // moving the image inside public/images  
            // $request->image->move(public_path('avatar'), $newImageName);
            // $slug = SlugService::createSlug(Model:class, Slug to store in field, To make slug using field);
            //dd($slug);
        
            Profile::where('id', $user_id)->create([
                'user_id' => $user_id,
                'avatar_path' => $newImageName,
                'biography' => $request->input('biography'),
                'instagram' => $request->input('instagram'),
                'facebook' => $request->input('facebook'),
                'twitter' => $request->input('twitter'),
            ]);
            $msg = array("msgType"=>"success","msg" => "About has been updated successfully!");
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
        $all_profiles = Profile::paginate(15); 
        return view('profiles.profile_view')->with('profiles', $all_profiles);
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
        
        switch($request->input('form_name')) {
            case('user_table_update'):
                // dd("inside switch case user", $user_id);
                $request->validate([
                    'user_name' => 'required | max:50 | min:3',
                    'email' => 'required | max:50 | min:10',
                ]);
                // dd("inside switch case user", $user_id);
                User::where('id', $user_id)->update([
                    'name' => $request->input('user_name'),
                    'email' => $request->input('email'),
                ]);
                $msg = array("msgType"=>"success","msg" => "User's name and email has been updated.");
                break;
            
            case('createAboutSection'):
                $request->validate([
                    'biography' => 'required | max:250',
                    'instagram' => 'nullable | max: 200',
                    'facebook' => 'nullable | max: 200',
                    'twitter' => 'nullable | max: 200',
                ]);
                // dd("inside switch case about", $user_id);
                Profile::where('user_id', $user_id)->update([
                    'biography' => $request->input('biography'),
                    'instagram' => $request->input('instagram'),
                    'facebook' => $request->input('facebook'),
                    'twitter' => $request->input('twitter'),
                ]);
                $msg = array("msgType" => "success","msg" => "About section has been updated.");
                break;

            case('changePassword'):
               
                // $request->validate([
                //     'currentPass' => 'required',
                //     'confNewPass' => 'required',
                //      'newPass'  => 'required  |  min:8 | max:16',
                                    
                //  ]);
                $request->validate([
                    'currentPass' => 'required',
                    'confNewPass' => 'required',
                    'newPass'  => 'required  |  min:8 | max:16',              
                 ]);
                // dd("inside switch case password", $user_id,$request->input('newPass'));
                $currentPass = $request->input('currentPass');
                $newPass = $request->input('newPass');
                $confNewPass = $request->input('confNewPass');
                //dd($confNewPass, $newPass, strcmp("asd", "asd"));
                //dd(Hash::check($currentPass, $currentPassInsideDB->password));
                $currentPassInsideDB = User::where('id', $user_id)->first();
                if(Hash::check($currentPass, $currentPassInsideDB->password)) {
                    if(!Hash::check($newPass, $currentPassInsideDB->password)) {
                        //strcmp() return 0 when string matches
                        if(strcmp($newPass, $confNewPass) == 0) {
                            $newPass = Hash::make($newPass);
                            User::where('id', $user_id)->update([
                                'password' => $newPass,
                            ]);
                            $msg = array("msgType"=>"success","msg" => "Password has been updated.");
                        } else {
                            $msg = array("msgType"=>"danger","msg" => "Both new password and confirm password field should have same value.");
                        }
                    } else {
                        $msg = array("msgType"=>"danger","msg" => "New Password Should be different from the previous one.");
                    }
                    
                } else {
                    $msg = array("msgType"=>"danger","msg" => "Forgot password?");
                }
                break;

            case('changeAvatar'):
                $request->validate([
                    'image' => 'required | mimes:jpg, png, jpeg | max:5048',
                ]);
                if($request->image !== NULL){
                    $oldImage = Profile::select('avatar_path')->where('user_id', $user_id)->first();
                    //  dd(print($oldImage->avatar_path));
                    unlink(public_path('avatar') .'/'.$oldImage->avatar_path);
                    $newImageName = uniqid() . '-' . $user_id . '.' .$request->image->extension();
                    // $request->image->move(public_path('avatar'), $newImageName);
                    $img = Image::make($request->image->getRealPath());
                    $destination = public_path('avatar');
                    $img->resize(220, 220)->save($destination . '/' . $newImageName);
                    Profile::where('user_id', $user_id)->update([
                        'avatar_path' => $newImageName,
                    ]);
                    $msg = array("msgType"=>"success","msg" => "Profile avatar updated.");
                } else
                    $msg = array("msgType"=>"warning","msg" => "Please choose an image before upload");

                break;

            case('removeAvatar'):
                $oldImage = Profile::select('avatar_path')->where('user_id', $user_id)->first();
                //  dd(print($oldImage->avatar_path));
                unlink(public_path('avatar') .'/'.$oldImage->avatar_path);
                $newImageName ="avatar-1299805_640.png";
                Profile::where('user_id', $user_id)->update([
                    'avatar_path' => $newImageName,
                ]);
                $msg = array("msgType"=>"danger","msg" => "Profile's avatar has been removed.");
                break;

            default:
                $msg = array("msgType"=>"danger","msg" => "Sorry for the inconvenience caused, please try again later.");
        }
        return redirect()->route('profile.edit',['user_id' => Auth::user()->id])->with('message', $msg);
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
