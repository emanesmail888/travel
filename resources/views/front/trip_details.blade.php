@extends('front.master')

@section('content')
    {{-- <canvas class=" w-100" width="100" height="1"></canvas> --}}







    <div id="example1" class="grid-accordion">
        <div class="ga-panels">

            @foreach ($tripDetails as $item)
                @foreach (json_decode($item->fileName) as $tripF)
                    <!-- Panel 1 -->
                    <div class="ga-panel">
                        <a href="#">
                            <img class="ga-background" src="{{ url('image', $tripF) }}" />
                        </a>

                        <div class="ga-layer ga-closed ga-white panel-counter" data-position="bottomLeft" data-horizontal="8"
                            data-vertical="8">


                        </div>

                        <h3 class="ga-layer ga-opened ga-black ga-padding" data-horizontal="40" data-vertical="62%"
                            data-show-transition="left" data-hide-transition="left">
                            <?php $string = Str::of($tripF)->basename('.jpg');
                            ?>
                            <p style="color: rgb(223, 223, 236)">{{ $string }}</p>
                        </h3>
                        {{-- <p class="ga-layer ga-opened ga-white ga-padding hide-medium-screen"
                data-horizontal="40" data-vertical="74%" data-width="350"
                data-show-transition="left" data-show-delay="400" data-hide-transition="left" data-hide-delay="500">
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p> --}}
                    </div>
                @endforeach
            @endforeach











        </div>
    </div>

    <!-- End of Grid Accordion -->






    <section id="">
        <div class="container">

            <div class="row">
                @foreach ($Trips as $trip)

                <div class="col-md-7 col-xs-12">

                    <div class="category-tab shop-details-tab "><!--category-tab-->
                        <div class="col-sm-12 mt-5 ">
                            <ul class="nav nav-tabs">
                                <li><a href="#activities" data-toggle="tab">Activities</a></li>
                                <li><a href="#program" data-toggle="tab">Programs</a></li>
                                <li><a href="#details" data-toggle="tab">Details</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade " id="activities">

                                    <h2>Activities:<h5 class="text-danger">
                                            <pre>{{ $trip->activities }}</pre>
                                        </h5>
                                    </h2>




                            </div>
                            <div class="tab-pane fade" id="program">

                                    <h2>Program:<h5 class="text-danger">
                                            <pre>{{ $trip->program }}</pre>
                                        </h5>
                                    </h2>



                            </div>
                            <div class="tab-pane fade show active in" id="details">
                                @foreach ($Trips as $trip)
                                <div class="thumbnail">
                                    <img src="{{ url('images', $trip->image) }}" class="card-img w-100">
                                    <br>

                                </div>

                                <h2 class="trip-title">
                                    <h2><?php echo ucwords($trip->trip_title); ?></h2>
                                    <h2> Trip Duration:<span class="text-danger ">{{ $trip->duration }}</span></h2>
                                    <h2> From:<span class="text-danger ">{{ $trip->from }}</span></h2>
                                    <h2> To: <span class="text-danger ">{{ $trip->to }}</span></h2>
                                    <h2>Best Season To Vist This City In:
                                        <span class="text-danger">{{ $seasons[$trip->season] }}</span> season
                                    </h2>
                                    {{-- {{ $trip->tripType }} --}}

                                    <h2 class="d-inline-block">
                                        The Aim Of This Trip Is:

                                        <span class="text-primary">
                                            @foreach (json_decode($trip->tripType) as $tripT)
                                                {{ $tripTypes[$tripT] }},
                                            @endforeach
                                        </span>
                                    </h2>
                                    <h2>Price:<span class="text-danger">{{ $trip->trip_price }}</span></h2>




                            </div>






                        </div>
                    </div><!--/category-tab-->


                </div><!-- col-md-6 -->

                <div class="col-md-5 mt-5 col-md-offset-1">

                    <div class="demo">
                        <div class="item">
                            <div class="clearfix w-100">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    @foreach ($tripDetails as $item)
                                        @foreach (json_decode($item->fileName) as $tripF)
                                            <li data-thumb="{{ url('image', $tripF) }}">
                                                <?php $string = Str::of($tripF)->basename('.jpg');
                                                ?>
                                                <p style="color: rgb(24, 24, 151)">{{ $string }}</p>
                                                <img src="{{ url('image', $tripF) }}" class="w-100 h-100" />
                                            </li>
                                        @endforeach
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="trip-details">
                            {{-- <div class="thumbnail">
                                <img src="{{ url('images', $trip->image) }}" class="card-img w-100">
                                <br>

                            </div> --}}

                            <h2 class="trip-title">




                                <form action="{{ url('/cart/addItem') }}/<?php echo $trip->id; ?>">
                                    <span>

                                        <button class="btn  d-block  m-2"  style=" background-color:rgb(158, 32, 60); color:#ffff;" id="addToCart_default">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>

                                    </span>


                                </form>


@if (Auth::check())
<?php
$wishData = DB::table('wishlist')
    ->rightJoin('trips', 'wishlist.trip_id', '=', 'trips.id')
    ->where('wishlist.trip_id', '=', $trip->id)
    ->get();
    $count = DB::table('wishlist')->where([ ['trip_id' ,'=', $trip->id ],['user_id' , '=' ,Auth::user()->id]])->count();
?>

<?php if($count=="0"){?>

    {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
    <input type="hidden" value="{{ $trip->id }}" name="trip_id" />
    <input type="submit" value="Add to Wishlist" class="btn " />



    {!! Form::close() !!}
   <?php } else {?>
   <h3 style="color:rgb(158, 32, 60);">Already Added to Wishlist <a
           href="{{ url('/wishlist') }}" style="">wishlist</a></h3>
   <?php }?>
@else
<a class="btn d-block" href="{{ route('login') }}" style=" background-color:rgb(158, 32, 60); color:#ffff;"> Login To Add toWishlist</a>

@endif



                           @endforeach



                    </div>
                </div>




                @endforeach
            </div>
        </div>



    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // instantiate the accordion
            $('#example1').gridAccordion({
                width: 1400,
                height: 650,
                responsiveMode: 'auto',
                openedPanelWidth: 'auto',
                openedPanelHeight: 'auto',
                closePanelsOnMouseOut: false,
                autoplay: false
            });

            // change the responsive mode
            $('.controls a').click(function(event) {
                event.preventDefault();

                if ($(this).hasClass('auto')) {
                    // change the responsive mode to 'auto' and remove the 'custom-responsive' class
                    $('#example1').removeClass('custom-responsive');
                    $('#example1').gridAccordion('responsiveMode', 'auto');

                    // change the arrows' visibility
                    $('.auto-arrow').show();
                    $('.custom-arrow').hide();
                } else if ($(this).hasClass('custom')) {
                    // change the responsive mode to 'custom' and add the 'custom-responsive'
                    // class in order to use it as a reference in the CSS code
                    $('#example1').addClass('custom-responsive');
                    $('#example1').gridAccordion('responsiveMode', 'custom');

                    // change the arrows' visibility
                    $('.custom-arrow').show();
                    $('.auto-arrow').hide();
                }
            });
        });
    </script>


    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
                method: 'HEAD',
                mode: 'no-cors'
            })).then(function(response) {
                return true;
            }).catch(function(e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>










    <script>
        $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop: true,
                keyPress: true
            });
            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 15,
                slideMargin: 0,
                speed: 500,
                auto: true,
                loop: true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>
@endsection
