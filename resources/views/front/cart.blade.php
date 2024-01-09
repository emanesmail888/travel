@extends('front.master')

@section('content')


<?php if ($cartItems->isEmpty()) { ?>
<br>
<br>
<br>
    <section id="cart_items">
        <div class="container">
            <div class=" d-block  text-center">  <img src="{{asset('dist/img/empty-cart.png')}}"/></div>
        </div>
    </section>

<?php } else { ?>
<br>
<br>
    <section id="cart_items">
        <div class="container">
<h1 class="text-warning text-center">Shopping Cart</h1>

                  <div id="updateDiv">


             @if (Session::has('success'))
              <div class="alert alert-success">
                <h3>{{Session::get('success')}}</h3>
             </div>
                  @endif



            <div class="table-responsive cart_info">

                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Image</td>
                            <td class="description">Product</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td class="delete">Delete</td>
                        </tr>





                 </thead>


                    @foreach($cartItems as $cartItem)
                    <tbody>
                        <tr>
                            <td class="cart_trip">

                         <img src="{{url('images',$cartItem->options->image)}}" style="height: 50px; width:50px;" >

                            </td>
                            <td class="cart_description">
                            <a href="{{url('/trip_details')}}/{{$cartItem->id}}">
                                <h4><a href="{{url('/trip_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                                <p>Trip ID: {{$cartItem->id}}</p>


                            </td>
                            <td class="cart_price">
                                <p>${{$cartItem->price}}</p>
                            </td>
                          {!! Form::open(['url' => ['cart/update',$cartItem->rowId], 'method'=>'put']) !!}

                            <td class="cart_quantity">

              <input type="number" size="2" value="{{$cartItem->qty}}" name="qty"
              autocomplete="off" style="text-align:center; max-width:65px; "  MIN="1" MAX="1000">

              <input type="submit" class="btn btn-success " value="Update" styel="margin:7px">

                         {!! Form::close() !!}
                            </td>



                            <td class="cart_total">
                                <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                            </td>
                            <td class="cart_delete">
                               <button class="btn btn-danger">
                                <a class="cart_quantity_delete text-white "
                                   href="{{url('/cart/remove')}}/{{$cartItem->rowId}}">Delete</a>
                                   </button>
                            </td>
                        </tr>






                    </tbody>
                    @endforeach
                </table>

               </div>
            <!-- End of Updatediv</div> --></div>


        </div>
    </section>

    <section id="related_trips">
        <div class="container">

                <h3>What would you like to do next?</h3>
                <p>Choose if you want to book and checkout that trip by credit or cash .</p>

            <div class="row d-flex">

                <div class="col-md-9">
                    <h3 class=" text-warning">Trips You Would Like ....</h3>

                    <div class="row">
                        @forelse ($trips as $trip)
                            <div class="col-md-4 ">


                                <div class="card-body mb-1 card1">


                                    <img src="{{ url('images', $trip->image) }}" class="w-100 " alt="card image cap">

                                    <h2 class="card-text text-center ">{{ $trip->trip_title }}</h2>
                                    <h2 class="card-text">{{ $trip->trip_price }}$</h2>


                                    <div class="d-flex justify-content-between ">


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
                                        <div class=" align-content-center">
                                            <input type="hidden" value="{{ $trip->id }}" name="trip_id" />
                                            <button type="submit" class="btn bg-transparent  ">
                                                <i class="fas fa-heart fa-2x text-center card-icon"></i>
                                            </button>
                                        </div>
                                        {!! Form::close() !!}
                                        <?php } else {?>
                                        <i class="fas fa-heart fa-2x mt-2 " style="color: rgb(53, 60, 75)"> </i>
                                        {{-- <h6 class="text-small text-success">Already Added to Wishlist <a href="{{url('/wishlist')}}">wishlist</a></h6> --}}
                                        <?php }?>
                                        @else
                                        <a class="btn d-block bg-transparent" href="{{ route('login') }}"><i class="fas fa-heart fa-2x text-center card-icon" ></i>

                                            @endif

                                        <a href="{{ url('/trip_details') }}/<?php echo $trip->id; ?>" class="btn bg-transparent  "><i
                                                class="fas fa-eye fa-2x card-icon text-center "></i>
                                        </a>

                                        <a href="{{ url('/cart/addItem') }}/<?php echo $trip->id; ?>" class=" btn  bg-transparent ">
                                            {{-- <i class="fa-solid fa-tickets-airline fa-2x card-icon text-center"></i> --}}
                                            <i class="fa fa-ticket fa-2x card-icon text-center "></i>
                                        </a>


                                    </div>



                                </div><!-- card-body -->
                            </div><!-- col-md-3 -->
                        @empty
                            <h3 class="text-danger text-center text-bold">No Trips</h3>
                        @endforelse
                    </div><!-- row -->




                </div>

                <div class="col-md-3 text-center ">
                    <h3 class="text-warning ">Total Cost ....</h3>
                    <div class="d-block pt-4">


                            <h5 class="">Trips Sub Total :<span class="text-success">${{Cart::subtotal()}}</span></h5>
                            <h5 class="">Adding Costs : <span class="text-success"> ${{Cart::tax()}}</span></h5>
                            <h5 class="">Total :<span class="text-success">${{Cart::total()}}</span></h5>

                    <a class="btn btn-success" href="{{url('/')}}/checkout">Check Out</a>
                </div>


                </div><!-- col-sm-6 -->



            </div><!-- row -->
        </div><!-- container -->
    </section>
<?php } ?>
@endsection
