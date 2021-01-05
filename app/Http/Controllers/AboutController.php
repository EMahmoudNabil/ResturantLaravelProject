<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\about;
use App\Http\Requests\CreateAboutRequest;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('about.index')->with('about',about::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAboutRequest $request)
    {
        $image=$request->image->store('about');
        about::create([
            'image'=> $image,
            'title'=> $request->title,
            'content'=>$request->content
            
        ]);
        session()->flash('success', 'about Created Successfully');
        return redirect(route('about.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(about $about)
    {
        return view('about.create')->with('about',$about);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAboutRequest $request,about $about)
    {
        $image=$request->image->store('about');
        $about->update([
            'image'=> $image,
            'title'=> $request->title,
            'content'=>$request->content
            
        ]);
        
        
        session()->flash('success', 'about updated successfully.');
        return redirect(route('about.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(about $about)
    {
        $about->delete();

        session()->flash('success', 'about Deleted successfully.');
        return redirect(route('about.index'));
    }
}
