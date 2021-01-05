@extends('layouts.app')

@section('content')

    

<h1 class="text-center my-5"> {{$contact->email}}</h1>


<div class="row justify-content-center">
<div class="col-md-6">
<div class="card card-default">
    <div class="card-header">
        Massage
    </div>

    <div class="card-body">
        {{$contact->massage}}
    </div>

    </div>
    
    <a  href="{{url('contact/'.$contact->id.'/delete')}}" class="btn btn-danger   my-2"> Delete Todo</a>
</div>
</div>

@endsection


