<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\navbar;
use App\Http\Requests\CreateNavbarRequest;


class navbarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('navbar.index')->with('navbar',navbar::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('navbar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNavbarRequest $request)
    {
        navbar::create([
            'name'=> $request->name,
            'link'=> $request->link
        ]);
        session()->flash('success', 'Navbar Created Successfully');
        return redirect(route('navbar.index'));
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
    public function edit(navbar $navbar)
    {
        return view('navbar.create')->with('navbar',$navbar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateNavbarRequest $request, navbar $navbar)
    {
        $navbar->update([
            'name' =>$request->name,
            'link' =>$request->link
        ]);
        
        
        session()->flash('success', 'Navbar updated successfully.');
        return redirect(route('navbar.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(navbar $navbar)
    {
        $navbar->delete();

        session()->flash('success', 'Navbar Deleted successfully.');
        return redirect(route('navbar.index'));
    }
}
