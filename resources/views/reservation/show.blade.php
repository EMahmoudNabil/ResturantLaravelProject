@extends('layouts.app')

@section('content')

    

<h1 class="text-center my-5"> {{$reservation->date1}}</h1>


<div class="row justify-content-center">
<div class="col-md-6">
<div class="card card-default">
    <div class="card-header">
        Reservation
    </div>

    <div class="card-body">
       <h4>Guest is :-  {{$reservation->smoke}}</h4> 
       <h4>Number of Guest:-  {{$reservation->numOfGest}}</h4> 
       <h4>Time attending:- {{$reservation->time1}}</h4> 
       
    </div>

    </div>
    
    <a  href="{{url('reservation/'.$reservation->id.'/delete')}}" class="btn btn-danger   my-2"> Delete reservation</a>
</div>
</div>

@endsection


