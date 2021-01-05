<?php

namespace App\Http\Controllers;

use App\Models\slidbar;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSlidebarRequest;

class SlidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('slidbar.index')->with('slidbar',slidbar::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slidbar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlidebarRequest $request)
    {
        $image=$request->image->store('slidbar');
        slidbar::create([
            'image'=> $image,
            'title'=> $request->title,
            'content'=>$request->content,
            'btnDisc'=>$request->btnDisc
        ]);
        session()->flash('success', 'Slidbar Created Successfully');
        return redirect(route('slidbar.index'));
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
    public function edit(slidbar $slidbar)
    {
        // return $slidbar;
        return view('slidbar.create')->with('slidbar',$slidbar);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSlidebarRequest $request, slidbar $slidbar)
    {
        $image=$request->image->store('slidbar');
        $slidbar->update([
            'image'=> $image,
            'title'=> $request->title,
            'content'=>$request->content,
            'btnDisc'=>$request->btnDisc
        ]);
        
        
        session()->flash('success', 'Slidbar updated successfully.');
        return redirect(route('slidbar.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(slidbar $slidbar)
    {
        $slidbar->delete();

        session()->flash('success', 'Slidbar Deleted successfully.');
        return redirect(route('slidbar.index'));
    }
}
