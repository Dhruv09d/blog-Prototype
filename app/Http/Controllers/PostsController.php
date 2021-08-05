<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Image;

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
        return view('blog.index')->with('posts', Post::where('status', "Approved")->orderBy('updated_at', 'DESC')->paginate(10));
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
            'title' => 'required | min:3 | max: 100',
            'description' => 'required | min:100 | max:1500',
            'image' => 'required | mimes:jpg, png, jpeg | max:5048',
        ]);

        $newImageName = uniqid(). '-' . $request->title . '.' .$request->image->extension();
        // 
        //dd($newImageName);
        // image resizing and moving the image inside public/images  
        $img = Image::make($request->image->getRealPath());
        $destination = public_path('images');
        $img->resize(1200, 600)->save($destination . '/' . $newImageName);
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
            'image' => 'mimes:jpg,png,jpeg|max:5048',
        ]);

        if($request->image !== NULL){
            //dd("got image");
            // deleteing old image from dir
            $oldImage = Post::select('image_path')->where('slug', $slug)->first();
            // dd(print($oldImage->image_path));
            unlink(public_path('images') .'/'.$oldImage->image_path);
            $newImageName = uniqid(). '-' . $request->title . '.' .$request->image->extension();
            $img = Image::make($request->image->getRealPath());
            $destination = public_path('images');
            $img->resize(1200, 600)->save($destination . '/' . $newImageName);
            // $request->image->move(public_path('images'), $newImageName);
            Post::where('slug', $slug)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'image_path' => $newImageName,
                'user_id' => auth()->user()->id
            ]);

        } else {
            //dd("no image");
            Post::where('slug', $slug)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            //'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);}
        

        return redirect('/blog')->with('message', 'Your post has been updated');
    }

    public function confirmDel(Request $request,$slug) {
        $post_owner_name = $request->input('owner_name');
        $post_title = $request->input('title'); 
        $post_updated_at = $request->input('updated_at'); 
        $post_image = $request->input('img_path');

        return view('blog.confirmDelete')->with('post_title', $post_title)->with('post_updated_at', $post_updated_at)->with('post_owner_name', $post_owner_name)->with('post_image', $post_image)->with('slug', $slug);
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
