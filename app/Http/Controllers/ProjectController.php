<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;
use App\Category;

class ProjectController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('title', 'asc')->get();
        $projects = Project::orderBy('id', 'desc')->paginate(5);
        return view('projects.index')->with('projects', $projects)->with('categories', $categories);
    }

    // public function category($id)   
    // {
    //     $categories = Category::orderBy('title', 'asc')->get();
    //     $projects = Project::orderBy('id', 'desc')->where('category_id', $id)->paginate(5);
    //     return view('projects.index')->with('projects', $projects)->with('categories', $categories);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('projects.create')->with('categories', $categories);
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
            'category_id'   => 'required',
            'body'          => 'required',
            'cover_image'   => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images/projects', $filenameToStore);
            
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $project = new Project();
        $project->cover_image = $filenameToStore;
        $project->user_id = auth()->user()->id;
        $project->category_id = $request->category_id;
        $project->fill($request->all());
        $project->save();
        return redirect()->action('DashboardController@project')->with('success', 'Project has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::FindOrFail($id);
        return view('projects.show')->with('project', $project);
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
        $project = Project::FindOrFail($id);
        return view('projects.edit')->with('project', $project)->with('categories', $categories);
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
            'category_id'   => 'required',
            'body'          => 'required',
            'cover_image'   => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images/projects', $filenameToStore);
        }

        $project = Project::find($id);
        $project->category_id = $request->category_id;
        $project->fill($request->all());
        if($request->hasFile('cover_image')){
            $project->cover_image = $filenameToStore;
        }
        $project->save();
        return redirect()->action('DashboardController@project')->with('success', 'Project has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if(auth()->user()->id !==$project->user_id){
            return redirect('/projects');
        }
        if($project->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/projects/'.$project->cover_image);
        }

        $project->delete();
        return redirect()->action('DashboardController@project')->with('success', 'Project has been deleted');
    }
}
