<!-- TEAM -->
<section id="team" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>Meet our chefs</h2>
                    <h4>They are nice &amp; friendly</h4>
                </div>
            </div>


            @foreach ($chef as $chefs)
            <div class="col-md-4 col-sm-4">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                    <img src="{{URL::asset('storage/'.$chefs->image)}}" class="img-responsive" alt="">
                            <div class="team-hover">
                                <div class="team-item">
                                    <h4>{{$chefs->content}}</h4> 
                                    <ul class="social-icon">
                                        <li><a href="{{$chefs->linkInsta}}" class="fa fa-linkedin-square"></a></li>
                                        <li><a href="{{$chefs->linkFase}}" class="fa fa-envelope-o"></a></li>
                                    </ul>
                                </div>
                            </div>
                </div>
                <div class="team-info">
                    <h3>{{$chefs->name}}</h3>
                    <p>{{$chefs->job}}</p>
                </div>
            </div>
            @endforeach

            
        </div>
    </div>
</section>