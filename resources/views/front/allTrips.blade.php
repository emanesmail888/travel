@extends('front.master')
@section('content')
    <main role="main">

        <section id="related_trips">

            <div class="container pb-5">
                <h1 class=" text-center text-warning">All <span>Trips In</span> {{ $category->title }} </h1>

                <div class="row">
                    @forelse ($trips as $trip)
                        <div class="col-md-3 ">


                            <div class="card-body mb-1 card1">


                                <img src="{{ url('images', $trip->image) }}" class="w-100 " alt="card image cap">

                                <h2 class="card-text text-center ">{{ $trip->trip_title }}</h2>
                                <h2 class="card-text">{{ $trip->trip_price }}$</h2>


                                <div class="d-flex justify-content-between ">

                                    @if (Auth::check())
                                    <?php $wishData = DB::table('wishlist')->where('user_id' , Auth::user()->id)->rightJoin('trips','wishlist.trip_id', '=', 'trips.id')->where('wishlist.trip_id', '=', $trip->id)->get();?>

                                                <?php  $count = DB::table('wishlist')->where([ ['trip_id' ,'=', $trip->id ],['user_id' , '=' ,Auth::user()->id]])->count();?>
                                                <?php if($count=="0"){?>

                                                    {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
                                                    <div class=" align-content-center">
                                                     <input type="hidden" value="{{$trip->id}}" name="trip_id"/>
                                                     <button type="submit" class="btn bg-transparent  ">
                                                        <i class="fas fa-heart fa-2x text-center card-icon" ></i>
                                                    </button>
                                                   </div>
                                                    {!! Form::close() !!}
                                                   <?php } else {?>
                                                    <i class="fas fa-heart fa-1x mt-2 " style="color: rgb(53, 60, 75)"> </i>
                                                    <?php }?>
                                            @else
                                            <a class="btn d-block bg-transparent" href="{{ route('login') }}"><i class="fas fa-heart fa-2x text-center card-icon" ></i>
                                            </a>

                                                 @endif


                                    <a href="{{ url('/trip_details') }}/<?php echo $trip->id; ?>" class="btn bg-transparent  "><i
                                            class="fas fa-eye fa-2x card-icon text-center "></i>
                                    </a>

                                    <a href="{{ url('/cart/addItem') }}/<?php echo $trip->id; ?>" class=" btn  bg-transparent ">
                                        <i class="fa fa-ticket fa-2x card-icon text-center "></i>
                                    </a>


                                </div>



                            </div><!-- card-body -->
                        </div><!-- col-md-4 -->
                    @empty
                        <h3 class="text-danger text-center text-bold">No Trips</h3>
                    @endforelse
                </div><!-- row -->

            </div><!-- container -->
        </section>
    </main>


























    </main>
@endsection
