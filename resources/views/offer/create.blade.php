@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
           {{isset($offer)?'Edit offer':'Create offer'}}
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
        <form action="{{isset($offer)?route('offer.update',$offer->id):route('offer.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($offer))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{isset($offer)?$offer->title:''}}">
                </div>
                <div class="form-group">
                    <label for="btnDisc">price</label>
                <input type="text" id="btnDisc" name="btnDisc" class="form-control" value="{{isset($offer)?$offer->btnDisc:''}}">
                </div>
                <div class="form-group">
                    <label for="content">content</label>
                <textarea  cols="5" rows="5" type="text" id="content" name="content" class="form-control" >{{isset($offer)?$offer->content:''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>

                    @if (isset($offer))
                 
                    {{-- value="{{isset($offer)?$offer->image:''}}" --}}
                    <div id="deleteImage">
                        <img src="{{asset('storage/'.$offer->image)}}"width="120px"  alt="image">
                        <span> <a href=""  id="deleteIMG">Delete Image</a></span>
                    </div>
                        <input type="file" id="imageslide" name="image" class="form-control" style="display: none">
                    
                    @else
                    <input type="file" id="image" name="image" class="form-control">

                    @endif
               
                </div>
            
                <div class="form-group">
                <button class="btn btn-success">{{isset($offer)?'Edit offer':'Add offer'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection


