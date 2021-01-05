@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            Contact Massage
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Massage</th>
                    <th></th>
                  
                </thead>
                <tbody>
                    @foreach ($contact as $contacts)
                        <tr> <td>{{$contacts->fname}} {{$contacts->lname}} </td>
                            <td>{{$contacts->email}}</td>
                            <td>{{$contacts->massage}}</td>
                        <td>  <a href="{{url('contact',$contacts->id)}}" class="btn btn-info float-right" >Show</a>
                            <a href="{{url('contact/'.$contacts->id.'/delete')}}" class="btn btn-danger float-right"  >Delete</a>    </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>





        </div>
    </div>
@endsection

