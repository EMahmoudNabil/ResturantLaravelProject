<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.index')->with('menu',menu::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMenuRequest $request)
    {
        $image=$request->image->store('menu');
        menu::create([
            'image'=> $image,
            'title'=> $request->title,
            'content'=>$request->content,
            'price'=>$request->price
        ]);
        session()->flash('success', 'menu Created Successfully');
        return redirect(route('menu.index'));
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
    public function edit(menu $menu)
    {
        return view('menu.create')->with('menu',$menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMenuRequest $request, menu $menu)
    {
        $image=$request->image->store('menu');
        $menu->update([
            'image'=> $image,
            'title'=> $request->title,
            'content'=>$request->content,
            'price'=>$request->price
        ]);
        
        
        session()->flash('success', 'menu updated successfully.');
        return redirect(route('menu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu $menu)
    {
        $menu->delete();

        session()->flash('success', 'menu Deleted successfully.');
        return redirect(route('menu.index'));
    }
}
