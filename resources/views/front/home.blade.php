@extends('front.master')

@section('content')
    <main role="main">

        <section class="px-1   ">


            <h1 class="text-center">Famous <span>Places In </span>The World</h1>

            <div id="images" class="w-100 h-25">
                @foreach ($slides as $slide)
                    <?php $string = Str::of($slide)->basename('.jpg');

                    ?>
                    <div><img src="{{ url('dist/img/cities', $slide) }}" class="w-100 h-100" />
                        <p style="color: rgb(167, 163, 204)">{{ $string }}</p>
                    </div>
                @endforeach

            </div>
        </section>





        <div class="container mt-5 text-center">
            <h1>Trips <span>Categories</span></h1>
            <div class="row">
                @foreach ($categories as $category)
                    <div class=" col-md-3 col-sm-6  card2">

                        {{-- @foreach ($cats as $cat)
                <a class="dropdown-item" href="{{url('allTrips',$cat->id)}}">{{ucwords($cat->title)}}</a>

                 @endforeach --}}
                        {{-- <div class=" card2 " > --}}

                        <a href="{{ url('allTrips', $category->id) }}"><img src="{{ url('images', $category->image) }}"
                                class=" img-fluid w-100   " alt="card image cap">
                            <p class="card-text mx-auto ">{{ $category->title }}</p>
                        </a>

                        {{-- </div> --}}

                    </div>
                @endforeach
            </div>
        </div>




        <section id="trips ">
            <div class="container  ">
                <div class="row text-center">

                    <h1>Featured <span>Destination</span></h1>




                    <div class="owl-carousel owl-theme  ">


                        @forelse ($trips as $trip)
                            <div class="card-body card1">


                                <img src="{{ url('images', $trip->image) }}" class="w-100 " alt="card image cap">

                                <p class="card-text">{{ $trip->trip_title }}</p>
                                <h2 class="card-text">{{ $trip->trip_price }}$</h2>


                                <div class="d-flex justify-content-between ">





                                    @if (Auth::check())
                                        <?php $wishData = DB::table('wishlist')
                                            ->where('user_id', Auth::user()->id)
                                            ->rightJoin('trips', 'wishlist.trip_id', '=', 'trips.id')
                                            ->where('wishlist.trip_id', '=', $trip->id)
                                            ->get(); ?>

                                        <?php $count = DB::table('wishlist')
                                            ->where([['trip_id', '=', $trip->id], ['user_id', '=', Auth::user()->id]])
                                            ->count(); ?>
                                        <?php if($count=="0"){?>

                                        {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
                                        <div class=" align-content-center">
                                            <input type="hidden" value="{{ $trip->id }}" name="trip_id" />
                                            <button type="submit" class="btn bg-transparent  ">
                                                <i class="fas fa-heart fa-2x text-center card-icon"></i>
                                            </button>
                                        </div>
                                        {!! Form::close() !!}
                                        <?php } else {?>
                                        <i class="fas fa-heart fa-1x mt-2 " style="color: rgb(53, 60, 75)"> </i>
                                        <?php }?>
                                    @else
                                        <a class="btn d-block bg-transparent" href="{{ route('login') }}"><i
                                            class="fas fa-heart fa-2x text-center card-icon"></i>
                                        </a>
                                    @endif



                                    <a href="{{ url('/trip_details') }}/<?php echo $trip->id; ?>"
                                        class="btn bg-transparent  "><i class="fas fa-eye fa-2x card-icon text-center "></i>
                                    </a>

                                    <a href="{{ url('/cart/addItem') }}/<?php echo $trip->id; ?>" class=" btn  bg-transparent ">
                                        {{-- <i class="fa-solid fa-tickets-airline fa-2x card-icon text-center"></i> --}}
                                        <i class="fa fa-ticket fa-2x card-icon text-center "></i>
                                    </a>


                                </div>



                            </div><!-- card-body -->
                        @empty
                            <h3>No Trips</h3>
                        @endforelse




                    </div><!-- owl-carsoule -->












                </div><!-- row -->

            </div><!-- container -->
        </section>

    </main>





    <section class=" ">
        <div class="container  ">
            <div class="row">
                <h1 class="text-center mb-2">What <span>The Aim</span> OF Travel !</h1>


                <div class="col-sm-3">
                    <div class="left-sidebar">

                        <div class="image">
                            <img src="{{ asset('dist/img/maladives.jpg') }}" class="w-100 h-75 mb-2" alt="">
                            <img src="{{ asset('dist/img/book1.jpg') }}" class="w-100 h-75 " alt="">


                        </div>

                    </div><!--left- sidebar -->

                </div><!--col-sm-3  -->



                <div class="col-sm-9">

                    <div class="row">


                        @foreach ($tripTypes as $tripType => $h)
                            {{-- @foreach ($h as $img) --}}
                            <div class=" col-md-4 col-sm-6 act  ">


                                <a href="{{ url('allTripTypes', $tripType) }}">
                                    <img src="{{ url('dist/img/trip_types', $h[0]) }}" class="w-100 h-75"
                                        style="border-radius: 30px;" alt="" />
                                </a>
                                <h3 class="text-center text-danger">{{ $h[1] }}</h3>


                            </div>

                            {{-- <img src="{{url('dist/img/trip_types',$img[0])}}"  class="w-100" alt=""/> --}}

                            {{-- @endforeach --}}
                        @endforeach

                    </div><!-- row -->


                </div><!-- col-sm-9 -->






            </div><!--row  -->
        </div><!--container  -->
    </section>
@endsection



@section('scripts')
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dot: true,
                rewind: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    300: {
                        items: 2
                    },
                    800: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        });
    </script>


    {{--
<script>
    $('#slick1').slick({


		rows: 2,
     autoplay: true,

 responsive: [{
    breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },

    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],





		dots: true,
		arrows: true,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4
 });
</script> --}}





    <script>
        $(function() {
            $('#images').click(function(e) {
                e.preventDefault();


            });

            $('#transition').change(function() {
                $(this).parent().find('div').hide(500);
                $(this).parent().find('div[data-transition="' + $(this).val() + '"]').show(500);
            });
            $('#transition').trigger('change');

            // $('#images').remove();
            $('#images').after('<div id="diaporama" ></div>');
            $('#diaporama').html($("#images").html());
            $('#diaporama').mixSlide({
                fullscreen: false,
                autoplay: true,
                thumbs: true,

                controls: true,
                transition: {
                    name: "circle"
                },
                animation: {
                    delay: 7,
                    speed: 7
                },
                labels: true,
                layout: MXS_LAYOUT_1
            });

        });
    </script>
@endsection
