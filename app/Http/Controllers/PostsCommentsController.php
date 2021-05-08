<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comments;
use Illuminate\Http\Request;

class PostsCommentsController extends Controller
{
    public function index()
    {
        //$post = Post::all();
        //dd($post);
        return view('blog.show')->with('comments', Comment::orderBy('updated_at', 'DESC')->get());
    }
    public function store(Post $post, Request $request) {
        //$post = Post::find($post);
        //dd($post);
     
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'comment' => $request->input('comment'),
        ]);
        return back();
       
        }

    public function destroy(Post $post, Request $request) {
        $request->user()->comments->where('post_id', $post->id)->first()->delete();
        return back();
    }
}
