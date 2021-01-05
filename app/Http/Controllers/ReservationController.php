<?php

namespace App\Http\Controllers;


use App\Models\navbar;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReservationRequest;
use App\Models\reservation;

class ReservationController extends Controller
{
    public function index()
    {
        // return '11111';
        return view('reservation.index')->with(['navbars'=> navbar::all(),'reservation'=> reservation::all()]);
    }


    
    public function show($IDreservation){
        $reservation=reservation::find($IDreservation);
        return view('reservation.show')->with('reservation',$reservation);
 
    }
    
    public function create(){
        // return '11111';
        return view('reservation.create')->with(['navbars'=> navbar::all(),'reservation'=> reservation::all()]);
    }

    public function store(CreateReservationRequest $request){
        reservation::create([
            'numOfGest'=> $request->numOfGest,
            'smoke'=>$request->smoke,
            'date1'=>$request->date1,
            'time1'=>$request->time1
        ]);
        session()->flash('success', 'Massage Send Successfully');
        return redirect('/resturant');
        // redirect()->route('')


    
    }
    
    
    
    public function destroy($IDreservation){
        
        $reservation=reservation::find($IDreservation);
        $reservation->delete();
        session()->flash('success', 'Todo deleted successfully.');
        return redirect('/resturant');
    }

}
