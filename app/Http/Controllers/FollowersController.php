<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use App\Models\Following;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function follow($profile_user_id) {
        // dd($profile_user_id);
        // creating following data for logged_in_user who pressed "follow" button
        // dd($profile_user_id);

        // checking if the Authenticated user is Already a follower
        $ifAuthUserAlreadyaFollower = Follower::where(['user_id' => $profile_user_id, 'follower_id' => Auth::user()->id])->first();
        // dd(!$ifAuthUserAlreadyaFollower);
        if (!$ifAuthUserAlreadyaFollower) {
            Following::create([
                'user_id' => Auth::user()->id,
                'following_id' => $profile_user_id
            ]);
    
            // creating follower data for the user whom logged_in_user going to follow
            Follower::create([
                'user_id' => $profile_user_id,
                'follower_id' => Auth::user()->id
            ]);
        }
        
        
        return redirect()->route('profile.index', ['user_id' =>$profile_user_id]);
    }

    public function unfollow($profile_user_id) {
        $ifAuthUserAlreadyaFollower = Follower::where(['user_id' => $profile_user_id, 'follower_id' => Auth::user()->id])->first();
        if ($ifAuthUserAlreadyaFollower) {
            Following::where('user_id', Auth::user()->id)->where('following_id', $profile_user_id)->first()->delete();
            Follower::where('user_id', $profile_user_id)->where('follower_id', Auth::user()->id)->first()->delete();

        }
        return redirect()->route('profile.index', ['user_id' => $profile_user_id]);

    }
}
