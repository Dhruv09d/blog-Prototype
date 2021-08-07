<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class feedbackFormsController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); //['except' => ['index', 'home']]
    } 
    public function index() {
    
        return view('feedback');
    }

    public function storefeedback(Request $request) {
        // dd($request->all());
        $request->validate([
            'feedback' => 'required | max:1000'
        ]);

        Feedback::create([
            'user_id' => Auth::user()->id,
            'feedback' => $request->feedback
        ]);

        return back()->with('msg', "Thank you for your feedback.");
    }
}   
