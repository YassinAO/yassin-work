<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show', 'category']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('title', 'asc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return view('posts.index')->with('posts', $posts)->with('categories', $categories);
    }

    public function category($id)   
    {
        $categories = Category::orderBy('title', 'asc')->get();
        $posts = Post::orderBy('id', 'desc')->where('category_id', $id)->paginate(5);
        return view('posts.index')->with('posts', $posts)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required',
            'category_id'   => 'required|integer',
            'tag_id'        => 'required',
            'body'          => 'required',
            'cover_image'   => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images/posts', $filenameToStore);
            
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $post = new Post();
        $post->cover_image = $filenameToStore;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->fill($request->all());
        $post->save();

        // Set to false to not overwrite tags values.
        $post->tags()->sync($request->tag_id, false);
        return redirect()->action('DashboardController@post')->with('success', 'Post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::FindOrFail($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::FindOrFail($id);
        return view('posts.edit')->with('post', $post)->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required', 
            'category_id'   => 'required|integer',
            'tag_id'        => 'required',
            'body'          => 'required',
            'cover_image'   => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images/posts', $filenameToStore);
        }

        $post = Post::find($id);
        $post->category_id = $request->category_id;
        $post->fill($request->all());
        if($request->hasFile('cover_image')){
            $post->cover_image = $filenameToStore;
        }
        $post->save();
        $post->tags()->sync($request->tag_id);
        return redirect()->action('DashboardController@post')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts');
        }
        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/posts/'.$post->cover_image);
        }

        $post->delete();
        return redirect()->action('DashboardController@post')->with('success', 'Post has been deleted');
    }
}
