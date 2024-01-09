@extends('front.master')
@section('content')
<style>
    table td { padding:10px
    }</style>
{{-- <br>
<br>
<br>
<br> --}}

{{-- <canvas class="my-2 w-100"  width="100" height="0"></canvas> --}}

<section >
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="text-bold"><a href="{{url('/profile')}}">Profile</a></li>
                <li class="active  pl-2 text-bold">My Order</li>
            </ol>
        </div><!--/breadcrums-->



        <div class="row">



          @include('profile.menu')




            <div class="col-md-8">
               <h3 ><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>,  Your Orders</h3>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Trip name</th>
                            <th>Trip Code</th>
                            <th>Order Total</th>
                            <th>Order Status</th>



                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->created_at}}</td>
                            <td>{{ucwords($order->trip_title)}}</td>
                            <td>{{$order->trip_price}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->status}}</td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>



@endsection
