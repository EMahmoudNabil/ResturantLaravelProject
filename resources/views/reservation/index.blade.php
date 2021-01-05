@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            reservation Massage
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Number of Gest</th>
                    <th>smoke</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th></th>
                  
                </thead>
                <tbody>
                    @foreach ($reservation as $reservations)
                        <tr> <td>{{$reservations->numOfGest}} </td>
                            <td>{{$reservations->smoke}}</td>
                            <td>{{$reservations->date1}}</td>
                            <td>{{$reservations->time1}}</td>
                        <td>  <a href="{{url('reservation',$reservations->id)}}" class="btn btn-info float-right" >Show</a>
                            <a href="{{url('reservation/'.$reservations->id.'/delete')}}" class="btn btn-danger float-right"  >Delete</a>    </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>





        </div>
    </div>
@endsection

