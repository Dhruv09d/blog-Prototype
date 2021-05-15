<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
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
        $request->validate([
            'comment' => 'required',
        ]);
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'comment' => $request->input('comment'),
        ]);
        return back();
       
        }

    public function destroy(Comment $com, Request $request) {
        //dd($request->id);
        Comment::where('id' ,$request->id)->first()->delete();
        return back();
    }
}
