<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'home']]);
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$post = Post::all();
        //dd($post);
        return view('blog.index')->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required | mimes:jpg, png, jpeg | max:5048',
        ]);

        $newImageName = uniqid(). '-' . $request->title . '.' .$request->image->extension();

        //dd($newImageName);
        // moving the image inside public/images  
        $request->image->move(public_path('images'), $newImageName);
        // $slug = SlugService::createSlug(Model:class, Slug to store in field, To make slug using field);
        //dd($slug);
        
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/blog')->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug, integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        //dd($id);
        //$comment = Comment::where('post_id', $id)->get();
        //dd($comment);
        return view('blog.show')->with('post', Post::where('slug', $slug)->first())
                               ->with('comments', Comment::where('post_id', $id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            //'image' => 'required | mimes:jpg, png, jpeg | max:5048',
        ]);

        Post::where('slug', $slug)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            //'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)  
    {
        $post = Post::where('slug', $slug)->first();
        $post->delete();
        return redirect('/blog')->with('message', 'Your post has been deleted!');
    }
}
