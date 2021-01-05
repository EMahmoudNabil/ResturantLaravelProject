
    
<nav class="navbar navbar-expand-md navbar-light  bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Resturant') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @foreach ($navbars as $navbar)
                {{-- <a href="{{route('about.index')}}">About</a> --}}
                <li class="<?php echo $navbar['name']  ==  "Home"  ? "active ml-4" : "smoothScroll ml-2"?>" >  <a href="{{$navbar->link}}"> {{ $navbar->name}}</a>   </li>

                @endforeach
                
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="mr-2 mt-2"><a href="#">Call Now! <i class="fa fa-phone"></i> 00201146285867</a></li>
                <a href="#footer" class="section-btn" data-toggle="modal" data-target="#myModal">Reserve a table</a>

            </ul>
        </div>
    </div>
</nav>


    @if (session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif


<!-- The Modal reservation table -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Reservation Table</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="{{url('storereservation')}}" method="post">
            @csrf
            <div class="row">
                <h5 class="col-sm-4 "> Namber of Guests</h5>
                <br><br><br><br>
    
                <div class="form-check col-sm-8 ">
                        <input class="one mr-2" type="radio" name="numOfGest" id="one" value="1" >
                        <label class="form-check-label  mr-2" for="one"> 1 </label>
                    
                        <input class="two mr-2" type="radio" name="numOfGest" id="two" value="2" >
                        <label class="form-check-label  mr-2" for="two"> 2 </label>
                
                        <input class="three  mr-2" type="radio" name="numOfGest" id="three" value="3" >
                        <label class="form-check-label  mr-2" for="three"> 3 </label>
                
                        <input class="four mr-2" type="radio" name="numOfGest" id="four" value="4" >
                        <label class="form-check-label mr-2" for="four">  4  </label>
    
                        <input class="five  mr-2" type="radio" name="numOfGest" id="five" value="5" >
                        <label class="form-check-label mr-2" for="five">  5    </label>
    
                        <input class="six  mr-2" type="radio" name="numOfGest" id="six" value="6" >
                        <label class="form-check-label  mr-2" for="six">  6  </label>
                    </div>  
                </div>
    
                
            <div class="row">
                <h5 class="col-sm-4" > Section</h5>
    
                <div class="btn-group btn-group-toggle btn-sm ml-3" data-toggle="buttons">
                    <label class="btn btn-success active">
                    <input type="radio" name="smoke" id="option1" autocomplete="off" checked value="Non-Smoking"> Non-Smoking
                    </label>
                    <label class="btn btn-danger">
                    <input type="radio" name="smoke" id="option2" autocomplete="off" value="Smoking"> Smoking
                    </label>
                
                </div>
                </div>
                <br>
            
    
                <div class="row">
                <h5 class="col-sm-4 "> Date</h5>
    
                    <div class="col col-sm-8 mt-3">
                    <input type="Date" class="form-control" placeholder="Date" name="date1">
                    </div>
                    <br><br>
                    <h5 class="col-sm-4 "> Time</h5>
                    <div class="col col-sm-8  mt-3">
                    <input type="time" class="form-control" placeholder="Time" name="time1">
                    </div>
                    <br><br>
                    </div>
          
    
                <div class="row">
                    <div class="col-8 float-right">
                        <button type="button " class="btn btn-secondary  col-sm-4 mt-3 mb-2 ">Cancel</button>
                        <button type="submit" class="btn btn-primary  col-sm-4 mt-3 mb-2 " name="reserve">Reserve</button>
                    </div>            
                </div>
        </form>
        </div>
        
        </div>
    </div>
    </div>
    
    
