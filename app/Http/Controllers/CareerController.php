<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;

class CareerController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('careers.create');
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
            $path = $request->file('cover_image')->storeAs('public/cover_images/careers', $filenameToStore);
            
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $career = new Career();
        $career->cover_image = $filenameToStore;
        $career->user_id = auth()->user()->id;
        $career->fill($request->all());
        $career->save();
        return redirect()->route('careers.show', $career->id)->with('success', 'Career has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $career = Career::FindOrFail($id);
        return view('careers.show')->with('career', $career);
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
        $career = Career::FindOrFail($id);
        return view('careers.edit')->with('career', $career)->with('categories', $categories);
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
            'body'          => 'required',
            'cover_image'   => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images/careers', $filenameToStore);
        }

        $career = Career::find($id);
        $career->category_id = $request->category_id;
        $career->fill($request->all());
        if($request->hasFile('cover_image')){
            $career->cover_image = $filenameToStore;
        }
        $career->save();
        return redirect()->route('careers.show', $id)->with('success', 'Career has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career = Career::find($id);

        if(auth()->user()->id !==$career->user_id){
            return redirect('/careers');
        }
        if($career->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/careers/'.$career->cover_image);
        }

        $career->delete();
        return redirect('dashboard')->with('success', 'Career has been deleted!');
    }
}
