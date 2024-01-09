<nav class="navbar navbar-expand-md Nav  bg-white navbar-dark">
    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
    <a href="{{ '/' }}" class="navbar-brand">
        <img src="{{ URL::asset('dist/img/hiw-worldgraphic.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-light" id="navbarsExampleDefault">


        <ul class="navbar-nav mx-auto main-nav">


            <li class="nav-item">
                @if (Auth::check())
                    <?php $count = DB::table('wishlist')
                        ->where('user_id', Auth::user()->id)
                        ->count(); ?>
                    <a class="nav-link " href="{{ url('/wishlist') }}"> <i class=" fa fa-star"></i>
                        ({{ $count }})WhisList</a>
                @else
                    <a class="nav-link " href="{{ url('/') }}"> <i class=" fa fa-star"></i> (0)WhisList</a>
                @endif


            </li>


            <li class="nav-item dropdown   ">

                <a class="nav-link dropdown-toggle  " href="http://example.com" id="dropdown01" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    <span class="badge badge-secondary badge-pill   "><i class="fa fa-ticket pr-1 fa-1x"></i> Ticket
                        {{ Cart::count() }}</span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <div class=" align-items-center">
                        <h4 class="d-flex justify-content-between align-items-center mb-2">

                            <span class="badge badge-secondary badge-pill  "><i
                                    class="fa fa-ticket  fa-3x pt-4"></i>{{ Cart::count() }}</span>
                            <span class="text-white text-center">Total: ({{ Cart::total() }})</span>

                        </h4>



                        <h4 class="d-flex justify-content-between align-items-center  mb-3">
                            <span class="text-white">Your cart</span>

                        </h4>
                        <ul class="list-group mb-3  ">
                            <?php $cartItems = Cart::content(); ?>
                            @foreach ($cartItems as $cartItem)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div class="col-md-4">
                                        <div>

                                            <img class="dropdownimage"
                                                src="{{ url('images', $cartItem->options->image) }}"
                                                class="img-responsive dropdownimage" style="width:50px" />

                                        </div>


                                    </div>

                                    <div class="col-md-8">
                                        <h6 class="my-0">Name: {{ $cartItem->name }}</h6>
                                        <span class="text-muted">Price: {{ $cartItem->price }}</span>
                                        </br>
                                        <small class="text-muted foat-right">Qty: {{ $cartItem->qty }}</small>

                                    </div>

                                </li>
                            @endforeach


                            <li class="list-group-item d-block  ">

                                <a class="btn d-block w-100  text-white mb-1 "
                                    href="{{ url('/') }}/checkout">Check Out</a>


                                <a class="btn  d-block  w-100   text-white " href="{{ url('/cart') }}">View Cart</a>


                            </li>
                        </ul>

                    </div>

                </div>

            </li>

            <!-- End of Dropdown Items Cart -->








        </ul>






        <ul class=" navbar-nav  main-nav">


            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-circle"></i> Register</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="../uploads/avatars/{{ Auth::user()->avatar }}" class=" rounded-circle mr-5  "
                            style="width: 70px; height:70px;" alt="">
                        {{ Auth::user()->name }}
                    </a>


                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <a class="dropdown-item" href="{{ url('/profile') }}">

                            Profile
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

            {{-- <li class="nav-item">
                    <a class="nav-link " href="{{url('/')}}#review">Review</a>
                  </li> --}}


        </ul>








    </div>
</nav>













<nav class="navbar navbar-expand-md mainNav  bg-white navbar-dark">
    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-light" id="navbarsExampleDefault">

        <ul class="navbar-nav mr-auto main-nav">

            {{-- <li class="nav-item">
          <a class="nav-link" href="{{url('products')}}">Shop</a>
        </li> --}}
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home </a>
            </li>





            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <?php $cats = DB::table('categories')->get(); ?>
                    @foreach ($cats as $cat)
                        <a class="dropdown-item"
                            href="{{ url('allTrips', $cat->id) }}">{{ ucwords($cat->title) }}</a>
                    @endforeach

                </div>
            </li>





























            {{-- <p>Date: <input type="text" id="datepicker1"></p>
        <p>Date: <input type="text" id="datepicker2"></p> --}}

            {{-- </form> --}}


            <!-- Start Of Dropdown of Cart Iems -->




            {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="{{url('/profile')}}" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Profile</a>
          <?php if (Auth::check()) { ?>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            {{-- <a class="dropdown-item" href="{{url('/profile')}}"><i class="fa fa-user"></i>{{Auth::user()->name}}</a> --}}
            {{-- <?php } ?>

            <?php if (Auth::check()) { ?>
            <a class="dropdown-item" href="{{url('/logout')}}"><i class="fa fa-lock"></i>Logout</a>
            <?php } else{?>

            <a class="dropdown-item" href="{{url('/login')}}">Login</a>
            <?php }?>
          </div>
        </li> --}}




        </ul>


    </div>

    {{--
    <div class="mr-auto d-flex  ">
         <form action="/action_page.php">
            <input type="date" id="from" name="from" placeholder="From"/>
            <input type="date" id="to" name="to" placeholder="To"/>
            <input type="submit">

        </div> --}}
    {!! Form::open(['route' => 'search']) !!}

    {{ Form::label('from', 'From') }}
    {!! Form::date('dateFrom', null, []) !!}

    {{ Form::label('To', 'To') }}
    {!! Form::date('dateTo', null, []) !!}

    {!! Form::submit('Check ') !!}
    {!! Form::close() !!}

</nav>





{{-- </header> --}}











{{-- </div><!-- container --> --}}
