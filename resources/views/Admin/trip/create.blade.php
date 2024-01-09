@extends('admin.master')
@section('content')
 <div class="container-fluid">
    <div class="row">
      {{-- <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light pt-5  sidebar"> --}}


             <div class="col-md-6">

            <h1 class="text-center">Add New Trip</h1>

            <div class="panel-body">


            {!! Form::open(['route' => 'trip.store', 'method' => 'post', 'files' => true]) !!}

              <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('trip_title', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}

                       <span style="color:red">{{ $errors->first('trip_title') }}</span>
                </div>



                <div class="form-group">
                    {{ Form::label('price', 'Price') }}
                    {{ Form::text('trip_price', null, array('class' => 'form-control')) }}

                       <span style="color:red">{{ $errors->first('trip_price') }}</span>
                </div>

                 <div class="form-group">
                    {{ Form::label('activities', 'activities') }}
                    {!! Form::textarea('activities', null,['class'=>'form-control', 'rows' => 5, 'cols' => 10]) !!}
                    {{-- {{ Form::text('activities', null, array('class' => 'form-control')) }} --}}
                  </div>

                <div class="form-group">
                    {{ Form::label('program', 'program') }}
                    {!! Form::textarea('program', null,['class'=>'form-control', 'rows' => 5, 'cols' => 10]) !!}

                    {{-- {{ Form::text('program', null, array('class' => 'form-control')) }} --}}

                       <span style="color:red">{{ $errors->first('program') }}</span>
                </div>

                <div class="form-group">
                    {{ Form::label('category_id', 'Categories') }}
                    {{ Form::select('category[]', $categories, null, ['class' => 'form-control','multiple'=>'multiple', 'placeholder'=>'SelectCategory']) }}

                    <span style="color:red">{{ $errors->first('category') }}</span>
               </div>
               <div class="form-group">
                {{ Form::label('tripType', 'TripType') }}
                {{ Form::select('tripType[]', $tripTypes, null, ['class' => 'form-control','multiple'=>'multiple', 'placeholder'=>'SelectTripType']) }}

                    <span style="color:red">{{ $errors->first('tripType') }}</span>
               </div>


                 <div class="form-group">
                    {{ Form::label('duration', 'duration') }}
                    {{ Form::text('duration', null, array('class' => 'form-control')) }}

                       <span style="color:red">{{ $errors->first('duration') }}</span>
                </div>
                 <div class="form-group">
                    {{ Form::label('from', 'From') }}
                    {!! Form::date('from', null, ['class' => 'form-control']) !!}

                       <span style="color:red">{{ $errors->first('from') }}</span>
                </div>
                 <div class="form-group">
                    {{ Form::label('to', 'To') }}
                    {!! Form::date('to', null, ['class' => 'form-control']) !!}

                       <span style="color:red">{{ $errors->first('to') }}</span>
                </div>

           <div class="form-group">
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image',array('class' => 'form-control')) }}

                       <span style="color:red">{{ $errors->first('image') }}</span>

            </div>


                 <div class="form-group">
                    {{ Form::label('season', 'Season') }}
                    {{ Form::select('season', $seasons, null, ['class' => 'form-control', 'placeholder'=>'SelectSeason']) }}


                    {{-- {{ Form::text('spl_price', null, array('class' => 'form-control')) }} --}}

                       <span style="color:red">{{ $errors->first('season') }}</span>
                </div>




                {{ Form::submit('Submit', array('class' => 'btn goo mx-auto d-block')) }}

     {!! Form::close() !!}






 {!! Form::open([ 'action'=> ['App\Http\Controllers\TripsController@uploadSubmit'], 'method' => 'post', 'files' => true]) !!}

     <div class="form-group">
        {{ Form::label('Name', 'Trips') }}
        {{ Form::select('trip_id', $trips, null, ['class' => 'form-control', 'placeholder'=>'SelectTrips']) }}

        <span style="color:red">{{ $errors->first('trip_id') }}</span>
   </div>

    <div class="form-group">
        {{ Form::label('Photos', 'Photos') }}
        {{ Form::file('images[]',array('class' => 'form-control','multiple'=>'multiple')) }}

               <span style="color:red">{{ $errors->first('images') }}</span>

    </div>


    {{ Form::submit('Submit', array('class' => 'btn d-block mx-auto goo')) }}

    {!! Form::close() !!}










    </div><!-- row -->

</div><!-- container-fluid -->

        </div>
 @endsection



