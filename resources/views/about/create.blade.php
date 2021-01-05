@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
           {{isset($about)?'Edit about':'Create about'}}
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
        <form action="{{isset($about)?route('about.update',$about->id):route('about.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($about))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{isset($about)?$about->title:''}}">
                </div>
             
                <div class="form-group">
                    <label for="content">content</label>
                <textarea  cols="5" rows="5" type="text" id="content" name="content" class="form-control" >{{isset($about)?$about->content:''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>

                    @if (isset($about))
                 
                    {{-- value="{{isset($about)?$about->image:''}}" --}}
                    <div id="deleteImage">
                        <img src="{{asset('storage/'.$about->image)}}"width="120px"  alt="image">
                        <span> <a href=""  id="deleteIMG">Delete Image</a></span>
                    </div>
                        <input type="file" id="imageslide" name="image" class="form-control" style="display: none">
                    
                    @else
                    <input type="file" id="image" name="image" class="form-control">

                    @endif
               
                </div>
            
                <div class="form-group">
                <button class="btn btn-success">{{isset($about)?'Edit about':'Add about'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection


