<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }


    public function store(Post $post, Request $request) {
        //$post = Post::find($id);
        //dd($post);

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        return back();
    }

    public function destroy(Post $post, Request $request) {
        $request->user()->likes->where('post_id', $post->id)->first()->delete();
        return back();
    }
}
