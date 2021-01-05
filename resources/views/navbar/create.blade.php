@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
           {{isset($navbar)?'Edit Navbar':'Create Navbar'}}
        </div>
        <div class="card-body">
            @if ($errors ->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{$error}}
                    </li>
                        
                    @endforeach
                </ul>
            </div>
                
            @endif
        <form action="{{isset($navbar)?route('navbar.update',$navbar->id):route('navbar.store')}}" method="POST">
                @csrf
                @if (isset($navbar))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{isset($navbar)?$navbar->name:''}}">
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                <input type="text" id="link" name="link" class="form-control" value="{{isset($navbar)?$navbar->link:''}}">
                </div>
                <div class="form-group">
                <button class="btn btn-success">{{isset($navbar)?'Edit navbar':'Add navbar'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection