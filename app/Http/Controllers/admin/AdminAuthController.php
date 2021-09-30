<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\Session;
use Image; // for resize

class AdminAuthController extends Controller
{
    // register
    public function register() {
        if (!session()->has('adminId'))
        {
            $hasAdmin = Admin::all()->first();
            //dd($hasAdmin);
            if (!$hasAdmin) {
                return view('admin.adminauth.register');
            } else {
                return view('admin.adminauth.login');
            }
            
        } else {
            // return view('admin.dashboard');
            return redirect()->route("admin.dashboard");
        }
    }

    public function create(Request $request) {
        // dd($request->image);
        $request->validate([
            'fname'     => 'required | string | min:3 | max:15',
            'lname'     => 'required | string | min:3 | max:15',
            'email'     => 'required | email',
            'phno'      => 'required',
            'image'    => 'mimes:jpeg,jpg,png,gif | max:3072',
            'password'  => 'required | min:6 | confirmed',
            'password_confirmation' => 'required',
        ]);
        // dd($request->all());
        if($request->image !== NULL){
            $newImageName = uniqid() .  '-' . $request->name .'.' .$request->image->extension();
            // $request->image->move(public_path('avatar'), $newImageName);
            $img = Image::make($request->image->getRealPath());
            $destination = public_path('adminavatar');
            $img->resize(220, 220)->save($destination . '/' . $newImageName);
        } else
            $newImageName ="avatar-1299805_640.png";
        // dd($request);
        admin::create([
            'firstname' => $request->fname,
            'lastname' => $request->lname,
            'email' => $request->email,
            'phone_no' => $request->phno,
            'password' => Hash::make($request->password),
            'admin_avatar' => $newImageName,

        ]);
        // return redirect()->route('admin.loginpage');
        return view('admin.adminauth.login');
    }


    // Login
    public function loginPage() {
        if (!session()->has('adminId'))
        {
            return view('admin.adminauth.login');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    public function login(Request $request) {
       
            $request->validate([
            'email'     => 'required | email',
            'password'  => 'required | min:6',
        ]);
        // dd($request->all());
        $adminAcc = Admin::where('email', $request->email)->first();
        // dd(Auth::attempt($credentials), $request->session()->regenerate());
        if($adminAcc !== null) {
            if(Hash::check($request->password, $adminAcc->password)) {
                // if (Auth::attempt($credentials)) {
                    // dd("Inside Route");
                $request->session()->put(['adminId' => $adminAcc->id, 'adminEmail' => $adminAcc->email, "adminFname" => $adminAcc->firstname ]);
                // return redirect()->intended('dashboard');
                return redirect()->route('admin.dashboard');

            } else {
                return back()->with('msg', 'Password is incorrect');
            }
        } else {
            return back()->with('msg', 'Email is not registered please check and try again');
        } 
    }

    public function logout() {
        if (session()->has('adminId'))
        {
            session()->pull(['adminId' => $adminAcc->id, 'adminEmail' => $adminAcc->email, "adminFname" => $adminAcc->firstname ]);
        }
  
        return redirect()->route('admin.login');
    }
}
