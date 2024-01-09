@extends('front.master')

@section('content')


    <section>
        <div class="container">
            <div class="row">
                <h2 class=" text-center">
                    <?php if (isset($msg)) {
                            echo $msg;
                        } else { ?> WishList Item <?php } ?> </h2>

                <?php if ($trips->isEmpty()) { ?>
                sorry, Trips not found
                <?php } else { ?>
                @foreach ($trips as $trip)
                    <div class="col-md-3 ">


                        <div class="card-body mb-1 card1">


                            <img src="{{ url('images', $trip->image) }}" class="w-100 " alt="card image cap">

                            <h2 class="card-text text-center ">{{ $trip->trip_title }}</h2>
                            <h2 class="card-text">{{ $trip->trip_price }}$</h2>


                            <div class="d-flex justify-content-between ">





                                <a href="{{ url('/') }}/removeWishList/{{ $trip->id }}"
                                    class="btn bg-transparent  "><i class="fa fa-trash fa-2x card-icon text-center "></i>
                                </a>
                                <a href="{{ url('/trip_details') }}/<?php echo $trip->id; ?>" class="btn bg-transparent  "><i
                                        class="fas fa-eye fa-2x card-icon text-center "></i>
                                </a>

                                <a href="{{ url('/cart/addItem') }}/<?php echo $trip->id; ?>" class=" btn  bg-transparent ">
                                    <i class="fa fa-ticket fa-2x card-icon text-center "></i>
                                </a>


                            </div>



                        </div><!-- card-body -->
                    </div><!-- col-md-4 -->
                    {{-- @empty
                            <h3 class="text-danger text-center text-bold">No Trips</h3>
                        @endforelse
                    </div><!-- row --> --}}
                @endforeach
                <?php } ?>


            </div>
            <ul class="pagination">
            </ul>

        </div>
        </div>
    </section>
@endsection
