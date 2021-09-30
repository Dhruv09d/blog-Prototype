<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postreport;

class PostReportController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); //['except' => ['index', 'home']]
    } 
    // One who is complained about; the subject of a complaint -> complainee. 
    public function index($complainent_id, $post_id) {
        // dd($complainent_id, $post_id);
        $user_has_reported_already = Postreport::where([["post_id", '=' ,$post_id], ["complainent_id", '=' ,$complainent_id]])->first();
        // dd($user_has_reported_already, gettype(!$user_has_reported_already));
        if(!$user_has_reported_already) {
            // dd("if");
            // return view('reportPost');
            return view('reportPostForm')->with("complainent_id", $complainent_id)->with("post_id", $post_id)->with("isreported", "");
        }  else {
            //  dd("else");
            return view('reportPostForm')->with("complainent_id", $complainent_id)->with("post_id", $post_id)->with("isreported", "Report exists");
        }
    }

    public function saveReport(Request $request) {
        // dd($request->all());
        $user_has_reported_already = Postreport::where(["post_id" => $request->post_id, "complainent_id" => $request->complainent_id])->first();
        if(!$user_has_reported_already) {
        $request->validate([
            'complainent_id' => 'required ',
            'post_id' => 'required',
            'selectedType' => 'required',
            'reason' => 'max: 300'
        ]);

        Postreport::create([
            'post_id' => $request->post_id,
            'complainent_id' => $request->complainent_id,
            'selectedType' => $request->selectedType,
            'reason' => $request->reason
        ]);

        return back()->with('msg', "Your report has been recorded");
        }  else {
            return back()->with('msg', "You have already reported this post");
        }
    }
}
