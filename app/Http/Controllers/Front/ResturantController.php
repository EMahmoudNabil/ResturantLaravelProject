<?php

namespace App\Http\Controllers\Front;

use App\Models\navbar;
use App\Http\Controllers\Controller;
use App\Models\about;
use App\Models\offer;
use App\Models\slidbar;
use App\Models\chef;
use App\Models\contact;
use App\Models\menu;
use Illuminate\Http\Request;
use App\Http\Requests\CreateContactRequest;

class ResturantController extends Controller
{
    public function index()
    {
        // return offer::all();
        return view('resturant.resturant')->with(['navbars'=> navbar::all(),'slidbars'=>slidbar::all(),'offer'=>offer::all(),'chef'=>chef::all(),'menu'=>menu::all(),'about',about::all()]);
    }
    public function about()
    {
        // return slidbar::get();
        return view('resturant.about')->with(['navbars'=> navbar::all(),'abouts'=> about::all()]);
    }


}
