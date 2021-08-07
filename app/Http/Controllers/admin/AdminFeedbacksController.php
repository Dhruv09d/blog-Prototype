<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class AdminFeedbacksController extends Controller
{
    public function index() {
        if (session()->has('adminId')) {
            $all_feedbacks = Feedback::orderBy('created_at', 'DESC')->paginate(10);
            return view('admin.feedback')->with('feedbacks', $all_feedbacks);
        } else {
            return view('admin.adminauth.login');
        }
    }
}
