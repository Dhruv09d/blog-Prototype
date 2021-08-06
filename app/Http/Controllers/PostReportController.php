<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostReportController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); //['except' => ['index', 'home']]
    } 
    // One who is complained about; the subject of a complaint -> complainee. 
    public function index($complainent_id, $complainee_id) {
        // dd($complainent_id, $complainee_id);
        return view('admin.reports.reportPost');
    }
}
