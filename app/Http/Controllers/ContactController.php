<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\navbar;
use Illuminate\Http\Request;
use App\Http\Requests\CreateContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        //  return '11111';
        return view('contact.index')->with(['navbars'=> navbar::all(),'contact'=> contact::all()]);
    }


    
    public function show($IDcontact){
        $contact=contact::find($IDcontact);
        return view('contact.show')->with('contact',$contact);
 
    }
    
    public function create(){
        // return '11111';
        return view('contact.create')->with(['navbars'=> navbar::all(),'contact'=> contact::all()]);
    }

    public function store(CreateContactRequest $request){
        contact::create([
            'fname'=> $request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'massage'=>$request->massage
        ]);
        session()->flash('success', 'Massage Send Successfully');
        return redirect('/newcontact');
        // redirect()->route('')


    
    }
    
    
    
    public function destroy($IDcontact){
        
        $contact=contact::find($IDcontact);
        $contact->delete();
        session()->flash('success', 'Todo deleted successfully.');
        return redirect('/contact');
    }




}
