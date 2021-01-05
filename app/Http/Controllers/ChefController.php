<?php

namespace App\Http\Controllers;

use App\Models\chef;
use Illuminate\Http\Request;
use App\Http\Requests\CreateChefRequest;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chef.index')->with('chef',chef::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chef.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateChefRequest $request)
    {
        $image=$request->image->store('chef');
        chef::create([
            'image'=> $image,
            'name'=> $request->name,
            'job'=>$request->job,
            'content'=>$request->content,
            'linkInsta'=>$request->linkInsta,
            'linkFase'=>$request->linkFase
        ]);
        session()->flash('success', 'Chef Created Successfully');
        return redirect(route('chef.index'));
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
    public function edit(chef $chef)
    {
        return view('chef.create')->with('chef',$chef);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateChefRequest $request, chef $chef)
    {
        $image=$request->image->store('chef');
        $chef->update([
            'image'=> $image,
            'name'=> $request->name,
            'job'=>$request->job,
            'content'=>$request->content,
            'linkInsta'=>$request->linkInsta,
            'linkFase'=>$request->linkFase
        ]);
        
        
        session()->flash('success', 'Chef updated successfully.');
        return redirect(route('chef.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(chef $chef)
    {
        $chef->delete();

        session()->flash('success', 'Chef Deleted successfully.');
        return redirect(route('chef.index'));
    }
}
