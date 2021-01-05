@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
           {{isset($chef)?'Edit chef':'Create chef'}}
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
        <form action="{{isset($chef)?route('chef.update',$chef->id):route('chef.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($chef))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{isset($chef)?$chef->name:''}}">
                </div>
                <div class="form-group">
                    <label for="job">Job</label>
                <input type="text" id="job" name="job" class="form-control" value="{{isset($chef)?$chef->job:''}}">
                </div>
                <div class="form-group">
                    <label for="linkInsta">Linkdin Link</label>
                <input type="text" id="linkInsta" name="linkInsta" class="form-control" value="{{isset($chef)?$chef->linkInsta:''}}">
                </div>
                <div class="form-group">
                    <label for="linkFase">Fasebook Link</label>
                <input type="text" id="linkFase" name="linkFase" class="form-control" value="{{isset($chef)?$chef->linkFase:''}}">
                </div>
                <div class="form-group">
                    <label for="content">content</label>
                <textarea  cols="5" rows="5" type="text" id="content" name="content" class="form-control" >{{isset($chef)?$chef->content:''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>

                    @if (isset($chef))
                 
                    {{-- value="{{isset($chef)?$chef->image:''}}" --}}
                    <div id="deleteImage">
                        <img src="{{asset('storage/'.$chef->image)}}"width="120px"  alt="image">
                        <span> <a href=""  id="deleteIMG">Delete Image</a></span>
                    </div>
                        <input type="file" id="imageslide" name="image" class="form-control" style="display: none">
                    
                    @else
                    <input type="file" id="image" name="image" class="form-control">

                    @endif
               
                </div>
            
                <div class="form-group">
                <button class="btn btn-success">{{isset($chef)?'Edit chef':'Add chef'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection


