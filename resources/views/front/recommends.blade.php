

 <div class="container">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">

          <div id="myCarousel" class="carousel slide bg-dark" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner bg-black">
                @foreach($items as $key => $slider)
                <div class="carousel-item w-100 {{$key == 0 ? 'active' : '' }}">
                    <img src="{{url('images', $slider->image)}}" class="d-block w-50 h-50 bg-opacity-75"  alt="...">

                    <div class="carousel-caption d-block text-white text-sm-right  ">
                    <h3>{{$slider->pro_name}}</h3>
                    <p>{{$slider->pro_info}}</p>
                </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div><!-- col-sm-8 -->
    <div class="col-sm-2">

    </div>

    </div><!-- row -->
    </div><!-- container -->


