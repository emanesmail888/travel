@extends('front.master')
@section('content')


<main role="main">
    <canvas class="my-4 w-100"  width="100" height="3"></canvas>

<section id="trips">

    <div class="album py-5 bg-light">
      <div class="container">
        <h1 class=" text-center ">Search<span>Trips</span> </h1>

        <div class="row">
@forelse ($trips as $trip)

<div class="col-md-4 ">


    <div class="card-body pb-1 card1">


        <img src="{{url('images', $trip->image)}}" class="w-100 "  alt="card image cap">

        <h2 class="card-text text-center">{{$trip->trip_title}}</h2>
        <h2 class="card-text">{{$trip->trip_price}}$</h2>


         <div class="d-flex justify-content-between ">


            <?php
            $wishData = DB::table('wishlist')->rightJoin('trips','wishlist.trip_id', '=', 'trips.id')->where('wishlist.trip_id', '=', $trip->id)->get();
            $count = App\Models\wishList::where(['trip_id' => $trip->id])->count();
             ?>

            <?php if($count=="0"){?>

              {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
              <div class=" align-content-center">
               <input type="hidden" value="{{$trip->id}}" name="trip_id"/>
               <button type="submit" class="btn bg-transparent  ">
                  <i class="fas fa-heart fa-2x text-center card-icon"></i>
              </button>
             </div>
              {!! Form::close() !!}
             <?php } else {?>
                     <i class="fas fa-heart fa-2x mt-2 " style="color: rgb(53, 60, 75)"> </i>
                {{-- <h6 class="text-small text-success">Already Added to Wishlist <a href="{{url('/wishlist')}}">wishlist</a></h6> --}}
            <?php }?>

                <a href="{{url('/trip_details')}}/<?php echo $trip->id; ?>"
                    class="btn bg-transparent  "><i class="fas fa-eye fa-2x card-icon text-center "></i>
                </a>

                <a href="{{url('/cart/addItem')}}/<?php echo $trip->id; ?>"
                    class=" btn  bg-transparent ">
                    {{-- <i class="fa-solid fa-tickets-airline fa-2x card-icon text-center"></i> --}}
                    <i class="fa fa-ticket fa-2x card-icon text-center "></i>
                </a>


           </div>



      </div><!-- card-body -->
</div><!-- col-md-4 -->
@empty
<h3>No Trips Yet</h3>
@endforelse
</div><!-- row -->

</div><!-- container -->
</div>
</section>
</main>


@endsection






