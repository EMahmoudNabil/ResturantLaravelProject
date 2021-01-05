
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            
            @foreach ($slidbars as $key=>$slidbar)
                    <div class="carousel-item  <?php echo $key  ==  0  ? "active " : ""?>">
                <img src="{{URL::asset('storage/'.$slidbar->image)}}" alt="Slider images 1" style="height: 652px;width: 100%;">
                <div class="container">
                    <div class="carousel-caption text-left">
                        
                    <h1>{{$slidbar->title}}</h1>
                    <p>{{$slidbar->content}}</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">{{$slidbar->btnDisc}}y</a></p>
                    </div>
                </div>
                </div>
            
            @endforeach
        
         
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        