<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminBlogsRequestController extends Controller
{
    public function index() {
        if(session()->has('adminId')) {
            $all_pending_post =  Post::where('status', "Pending")->orderBy('updated_at', 'DESC')->get();
            // dd($all_pending_post);
            return view('admin.blogs.blogRequest')->with('posts', $all_pending_post );

        } else {
            return view('admin.adminauth.login');
        }
    }

    public function show($post_slug) {
        if(session()->has('adminId')) {
            $get_post = Post::where('slug', $post_slug)->first();
            // dd($get_post);
            return view('admin.blogs.blogshow')->with('post', $get_post);
        } else {
            return view('admin.adminauth.login');
        }
    }

    public function review_result($blog_id) {
        if(session()->has('adminId')) {
            // dd($blog_id);
            // if($request->form_name == "")
        }  else {
        return view('admin.adminauth.login');
        }
    }
}
