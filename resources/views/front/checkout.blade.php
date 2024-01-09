@extends('front.master')
@section('content')
    <canvas class="my-4 w-100" width="100" height="8"></canvas>

    <section class="hero hero-page gray-bg padding-small">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-9 order-2 order-lg-1">
                    <h1>Checkout</h1>
                    <p class="lead text-muted">You currently have {{ Cart::count() }} item(s) in your basket</p>
                </div>
                <ul
                    class="breadcrumb d-flex justify-content-start justify-content-lg-center col-lg-3 text-right order-1 order-lg-2">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Checout Forms-->
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <?php $count = 1; ?>
                @foreach ($cartItems as $cartItem)
                    <tbody>

                        <tr>

                            <td class="cart_product">
                                <img src="{{ url('images', $cartItem->options->image) }}" style="height: 50px; width:50px;">


                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ url('/trip_details') }}/{{ $cartItem->id }}"
                                        style="color:blue">{{ $cartItem->name }}</a></h4>
                                <p>Trip ID: {{ $cartItem->id }}</p>
                                {{-- <p>Only {{$cartItem->options->stock}} left</p> --}}
                            </td>
                            <td class="cart_price">
                                <p>${{ $cartItem->price }}</p>
                            </td>
                            {!! Form::open(['url' => ['cart/update', $cartItem->rowId], 'method' => 'put']) !!}

                            <td class="cart_quantity">

                                <input type="number" size="2" value="{{ $cartItem->qty }}" name="qty"
                                    autocomplete="off" style="text-align:center; max-width:65px; " MIN="1"
                                    MAX="1000">

                                <input type="submit" class="btn btn-success " value="Update" styel="margin:7px">

                                {!! Form::close() !!}

        </div>
        </td>
        <td class="cart_total">
            <p class="cart_total_price">${{ $cartItem->subtotal }}</p>
        </td>
        <td class="cart_delete">
            <button class="btn btn-danger">
                <a class="cart_quantity_delete text-white "
                    href="{{ url('/cart/remove') }}/{{ $cartItem->rowId }}">Delete</a>
            </button>
        </td>
        </tr>

        <?php $count++; ?>
        </tbody>
        @endforeach
        </table>
    </div>
    </div>


    <?php // form start here
    ?>
    <section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="checkout1.html" class="nav-link active">Address</a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Delivery Method </a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Payment Method </a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Order Review</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="address" class="active tab-block">




                            <form action="{{ url('/') }}/formvalidate" method="post">
                                {{-- @csrf --}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <h1>Shopper Information</h1>

                                    <div class="form-group col-md-6">
                                        <label for="fullName" class="form-label">Display Name</label>


                                        <input id="fullName" type="text" name="fullName" placeholder="Display Name"
                                            value="{{ old('fullName') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('fullName') }}</span>


                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="state" class="form-label">State Name</label>

                                        <input id="state" type="text" name="state" placeholder="State Name"
                                            value="{{ old('state') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('state') }}</span>
                                    </div>




                                    <div class="form-group col-md-6">
                                        <label for="pinCode" class="form-label">Pincode</label>

                                        <input id="pinCode" type="text" name="pinCode" placeholder="pinCode"
                                            value="{{ old('pinCode') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('pinCode') }}</span>

                                    </div>




                                    <div class="form-group col-md-6">
                                        <label for="city" class="form-label">City Name</label>

                                        <input id="city" type="text" name="city" placeholder="City Name"
                                            value="{{ old('city') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('city') }}</span>

                                    </div>


                                    <hr>

                                    <select name="country" class="form-control">
                                        <option value="{{ old('country') }}" selected="selected">Select country</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="United States">United States</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="UK">UK</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Ucrane">Ucrane</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Dubai">Dubai</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('country') }}</span>

                                    {{-- <div class="payment-options">
            <span>
                <input type="radio" name="pay" value="COD" checked="checked" id="cash"> COD

            </span>
            <span>
                <input type="radio" name="pay" value="paypal" id="paypal"> PayPal
                @include('front.paypal')
            </span>

            <span>
            <input type="submit" value="COD" class="btn btn-primary" id="cashbtn">
            </span>
        </div> --}}



                                    <span>
                                        <input type="radio" name="payment_type" value="COD" checked="checked"> COD
                                    </span>

                                    <span>
                                        <input type="radio" name="payment_type" value="paypal"> PayPal
                                    </span>


                                    <span>
                                        <input type="submit" value="Continue" class="btn btn-primary btn-sm">
                                        <span>







                                </div>


                            </form>







                            <div class="CTAs d-flex justify-content-between flex-column flex-lg-row mb-5">
                            <a href="{{url('/cart')}}" class="btn btn-template-outlined wide prev"> <i class="fa fa-angle-left"></i>Back to
                                    basket</a>
                            <a href="{{url('/')}}/checkout" class="btn btn-template wide next">Choose delivery
                                    method<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="block-body order-summary">
                        <h6 class="text-uppercase">Order Summary</h6>
                        <p>Shipping and additional costs are calculated based on values you have entered</p>
                        <ul class="order-menu list-unstyled">
                            <li class="d-flex justify-content-between"><span>Order Subtotal
                                </span><strong>${{ Cart::subtotal() }}</strong></li>
                            <li class="d-flex justify-content-between">
                                <span>Tax</span><strong>${{ Cart::tax() }}</strong></li>
                            <li class="d-flex justify-content-between"><span>Total</span><strong
                                    class="text-primary price-total">${{ Cart::total() }}</strong></li>
                        </ul>
                        {{-- <a class="btn btn-primary btn-lg" href="/cart/pay-with-paypal">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
                            </svg>
                            Pay with PayPal</a> --}}
                        <div id="paypal" style="display: none" >
                            @include('front.paypal')

                        </div>
                    </div>
                </div><!--col-lg-4  -->

            </div>
        </div>
    </section>
    <?php // form start here
    ?>
@endsection
@section('scripts')
<script>
    $(function() {
        $('input[name="payment_type"]').on('click', function() {
            if ($(this).val() == 'paypal') {
                $('#paypal').show();
            } else {
                $('#paypal').hide();
            }
        });
    });
</script>

@endsection


