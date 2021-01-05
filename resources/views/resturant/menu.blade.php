
 <!-- MENU-->
 <section id="menu" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                        <h2>Our Menus</h2>
                        <h4>Tea Time &amp; Dining</h4>
                    </div>
                </div>


                @foreach ($menu as $menus)
                <div class="col-md-4 col-sm-6">
                    <!-- MENU THUMB -->
                    <div class="menu-thumb">
                        <a href="{{URL::asset('storage/'.$menus->image)}}" class="image-popup" title="{{$menus->title}}">
                            <img src="{{URL::asset('storage/'.$menus->image)}}" class="img-responsive" alt="">

                            <div class="menu-info">
                                    <div class="menu-item">
                                        <h3>{{$menus->title}}</h3>
                                        <p>{{$menus->content}}</p>
                                    </div>
                                    <div class="menu-price">
                                        <span>${{$menus->price}}</span>
                                    </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
             



        </div>
    </div>
</section>
