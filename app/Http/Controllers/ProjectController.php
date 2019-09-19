<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;

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
        $projects = Project::orderBy('id', 'desc')->paginate(5);
        return view('projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
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
        $project->fill($request->all());
        $project->save();
        return redirect()->route('projects.show', $project->id)->with('success', 'Project has been created!');
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
        $project = Project::FindOrFail($id);
        return view('projects.edit')->with('project', $project);
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
        $project->fill($request->all());
        if($request->hasFile('cover_image')){
            $project->cover_image = $filenameToStore;
        }
        $project->save();
        return redirect()->route('projects.show', $id)->with('success', 'Project has been updated!');
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
        return redirect('dashboard')->with('success', 'Project has been deleted!');
    }
}
