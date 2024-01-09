@extends('admin.master')


@section('content')

 <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
    <canvas class="my-4 w-100"  width="100" height="2"></canvas>

<h3>Trips</h3>
  <div class="row">

              <div class="col-md-8">

                {!! Form::model($Trips, ['method'=>'post', 'action'=> ['App\Http\Controllers\TripsController@editTrips', $Trips->id], 'files'=>true]) !!}


                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('trip_title', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}

                    </div>



                    <div class="form-group">
                        {{ Form::label('price', 'Price') }}
                        {{ Form::text('trip_price', null, array('class' => 'form-control')) }}

                    </div>

                     <div class="form-group">
                        {{ Form::label('activities', 'activities') }}
                        {!! Form::textarea('activities', null,['class'=>'form-control', 'rows' => 5, 'cols' => 10]) !!}
                      </div>

                    <div class="form-group">
                        {{ Form::label('program', 'program') }}
                        {!! Form::textarea('program', null,['class'=>'form-control', 'rows' => 5, 'cols' => 10]) !!}


                    </div>


                    <div class="form-group">
                        {{ Form::label('tripType', 'TripType') }}
                        {{ Form::select('tripType[]', $tripTypes, null, ['class' => 'form-control','multiple'=>'multiple', 'placeholder'=>'SelectTripType']) }}

                   </div>

                   <select   name="category[]" class=" form-control" multiple="multiple">
                    @foreach($categories as $cat)
                    <option value="{{$cat->id }}" {{$cat->id == $Trips->category_id ? 'selected' : '' }}> {{$cat->title}}</option>
                    @endforeach
                    </select>





                     <div class="form-group">
                        {{ Form::label('duration', 'duration') }}
                        {{ Form::text('duration', null, array('class' => 'form-control')) }}

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
                        {{ Form::label('season', 'Season') }}
                        {{ Form::select('season', $seasons, null, ['class' => 'form-control', 'placeholder'=>'SelectSeason']) }}



                    </div>












                <img class="card-img-top img-fluid" src="{{url('images',$Trips->image)}}" style="width:50px" alt="Card image cap">







            {{ Form::submit('Update', array('class' => 'btn btn-success btn-small')) }}
   {!! Form::close() !!}

              </div><!-- col-md-8 -->



<div class="col-md-4">
  <h1>Change Image</h1>
       <img class="card-img-top img-fluid" src="{{url('images',$Trips->image)}}" style="width:200px" alt="Card image cap">

       <p><a href="{{route('ImageEditForm',$Trips->id)}}"
        class="btn btn-info">Change Image</a>
         </p>
















 </div><!-- col-md-4 -->



 </div><!-- row -->



 </main>



  @endsection









