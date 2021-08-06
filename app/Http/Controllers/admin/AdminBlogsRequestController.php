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

    public function review_result(Request $request,$blog_id) {
        if(session()->has('adminId')) {
            // dd($blog_id);
            // update post status to Approve
            switch($request->form_name) {
                case "approve_post":
                    Post::where('id', $blog_id)->update([
                        'status' => 'Approved',
                    ]);
                    // $msg = $post->title." is approved." ;
                    $msg = array("msgType"=>"success","msg" => "'" . $request->title . "'" ." is approved.");
                    break;
                case "reject_post":
                    Post::where('id', $blog_id)->update([
                        'status' => 'Rejected',
                    ]);
                    $msg = array("msgType"=>"success","msg" => $request->title." is rejected.");
                    break;
                default:
                    $msg = array("msgType"=>"warning","msg" => $request->title." is rejected.");
                    return back()->with('message', $msg);
            }
            $all_pending_post =  Post::where('status', "Pending")->orderBy('updated_at', 'DESC')->get();
            return redirect()->route('admin.blog_request', ['posts' => $all_pending_post])->with('message', $msg); 
        }  else {
            return view('admin.adminauth.login');
        }
    }


    public function approved() {
        if(session()->has('adminId')) {
            $all_approved_post =  Post::where('status', "Approved")->orderBy('updated_at', 'DESC')->get();
            // dd($all_pending_post);
            return view('admin.blogs.blogApproved')->with('posts', $all_approved_post );

        } else {
            return view('admin.adminauth.login');
        }
    }

    public function rejected() {
        if(session()->has('adminId')) {
            $all_rejected_post =  Post::where('status', "Rejected")->orderBy('updated_at', 'DESC')->get();
            // dd($all_pending_post);
            return view('admin.blogs.blogReject')->with('posts', $all_rejected_post );

        } else {
            return view('admin.adminauth.login');
        }
    }
}
