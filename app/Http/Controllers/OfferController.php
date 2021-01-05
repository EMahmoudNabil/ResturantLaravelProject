<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOfferRequest;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('offer.index')->with('offer',offer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOfferRequest $request)
    {
        $image=$request->image->store('offer');
        offer::create([
            'image'=> $image,
            'title'=> $request->title,
            'content'=>$request->content,
            'btnDisc'=>$request->btnDisc
        ]);
        session()->flash('success', 'offer Created Successfully');
        return redirect(route('offer.index'));
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
    public function edit(offer $offer)
    {
        return view('offer.create')->with('offer',$offer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOfferRequest $request ,offer $offer)
    {
        $image=$request->image->store('offer');
        $offer->update([
            'image'=> $image,
            'title'=> $request->title,
            'content'=>$request->content,
            'btnDisc'=>$request->btnDisc
        ]);
        
        
        session()->flash('success', 'Offer updated successfully.');
        return redirect(route('offer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(offer $offer)
    {
        $offer->delete();

        session()->flash('success', 'Offer Deleted successfully.');
        return redirect(route('offer.index'));
    }
}
