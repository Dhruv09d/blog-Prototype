<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postreport;

class AdminPostsReportsController extends Controller
{
    public function index() {
        if (session()->has('adminId')) {
            $all_reports = Postreport::orderBy('created_at', 'DESC')->paginate(10);
            return view('admin.postsReports')->with('reports', $all_reports);
        } else {
            return view('admin.adminauth.login');
        }
    }
}
