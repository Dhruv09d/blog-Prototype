<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        //dd($user);
        // $user->token;

        // checking if the user is already present in our database
        $userAuth = User::where('email', $user->email)->first();
        if ($userAuth) {
            //login
            Auth::login($userAuth);
        } else {
            // $newUser = new User();
            // $newUser->email = $user->email;
            // $newUser->name = $user->name;
            // $newUser->password = uniqid();
            // $newUser->save();
            // //login
            // Auth::login($newUser);
            return view('auth.passwords.socialFirstRegister')->with('email', $user->email)->with('name', $user->name);
        } 
        return redirect('/');
    }

    // Github
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGithub()
    {
        $user = Socialite::driver('github')->stateless()->user();
        //dd($user);
        // $user->token;
        
        // checking if the user is already present in our database
        $userAuth = User::where('email', $user->email)->first();
        if ($userAuth) {
            //login
            Auth::login($userAuth);
        } else {
            // $newUser = new User();
            // $newUser->email = $user->email;
            // $newUser->name = $user->name;
            // $newUser->password = uniqid();
            // $newUser->save();
            // //login
            // Auth::login($newUser);
            return view('auth.passwords.socialFirstRegister')->with('email', $user->email)->with('name', $user->name);
        } 
        return redirect('/'); 
    }


    // Facebook
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackFacebook()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        //dd($user);
        // $user->token;
        
        // checking if the user is already present in our database
        $userAuth = User::where('email', $user->email)->first();
        if ($userAuth) {
            //login
            Auth::login($userAuth);
        } else {
            // $newUser = new User();
            // $newUser->email = $user->email;
            // $newUser->name = $user->name;
            // $newUser->password = uniqid();
            // $newUser->save();
            // //login
            // Auth::login($newUser);
            return view('auth.passwords.socialFirstRegister')->with('email', $user->email)->with('name', $user->name);
        } 
        return redirect('/'); 
    }

    public function socialLoginPw(Request $request) {
        // dd($request->password, $request->cpassword);
        if($request->password === $request->cpassword && (($request->cpassword!== null || $request->cpassword === '') && ($request->password !== '' || $request->password !== null)) ) {
            $newUser = new User();
            $newUser->email = $request->email;
            $newUser->name = $request->name;
            $newUser->password = Hash::make($request->password);
            $newUser->save();
            Auth::login($newUser);
            return redirect('/');
        } else {
            return redirect()->route('login.google');
        }
    }
}
