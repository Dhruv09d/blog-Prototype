<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Charts\dashboardCharts;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB; 

class AdminPagesController extends Controller
{
    public function index() {
        if(session()->has('adminId')) {
            $post_dates = DB::select('SELECT   DATE_FORMAT(created_at,"%y-%m-%d") as created_at from posts;');
            $post_count = Post::all()->count();
            $post_new = Post::where('status' , "Pending")->count();
            $user_count = User::all()->count();
            
            // $post_count = Post::all()->count();
            // return $post_dates;
            // $json = json_encode($post_dates);

            // dd($json);
            $counts = array_count_values(
                array_column($post_dates, 'created_at')
            );
            // $string_counts_arr = json_encode($counts);
            // $counts_array = json_decode($string_counts_arr, true);
            // return $counts;
            // dd(gettype($counts), $counts[0]);
            $label_data = $dates_data = [];
            $i  = 0;
            foreach($counts as $key => $value) {
                $label_data[$i] = $value;
                $date_data[$i] =  $key;
                
                $i++;
            }
            // return  $date_data;
            // $label_data = $dates_data = [];
            // for($i = 0; $i <= $post_count; $i++ ) {
            //     $dates_data[$i] = $counts[$i][1];
            // }
            // return $label_data;
            // $string_date_arr = json_encode($post_dates);
            // $date_array = json_decode($string_date_arr, true);
            // // dd(gettype($post_dates), $date_array[0]['created_at']);
            // for ($i = 0; $i < $post_count; $i++) {
                
            //     $label_data[$i] = $date_array[$i]['created_at'];
            // }
            // return $label_data;
            // dd("label", $label_data);
            $chart = new dashboardCharts;
            $chart->labels($date_data);
            $chart->dataset('Blog Posted',  'line',  $label_data)->backgroundColor('rgb(224, 244, 255)')->color('rgb(101, 190, 240)');
            
            return view('admin.dashboard', ['chart' => $chart])->with('total_post', $post_count)->with('new_post', $post_new)->with('total_user', $user_count);
        } else
            return view('admin.adminauth.login');
        // return view('admin.dashboard'); 
    }   
}
