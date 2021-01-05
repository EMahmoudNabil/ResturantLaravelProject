<!-- offer content -->
<div class="mainTitle">
	<div class="container">
	<h1>Offer Restaurant</h1>
	<p>
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
	</p>
	</div>
	</div>

    <!-- Offer feature -->
    <div class="container marketing">
      <div class="row">

        @foreach ($offer as $offers)
        <div class="col-lg-4">
          <img class="img-circle" src="{{URL::asset('storage/'.$offers->image)}}" alt="Generic placeholder image">
          <h2>{{$offers->title}}</h2>
          <p>{{$offers->content}}</p>
          <p><a class="btn btn-default" href="#" role="button">&pound; {{$offers->btnDisc}} Add to cart &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        @endforeach

      </div><!-- /.row -->
	</div>
