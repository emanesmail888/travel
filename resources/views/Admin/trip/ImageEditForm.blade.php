<br>
<br>
<br>
<br>


<h1>Hello</h1>


@extends('admin.master')


@section('content')

<div class="row">

<div class="container">


<div class="col-md-6">
<h1>Hello Everybody</h1>


</div>


<div class="col-md-6">
<h1>Hello Everybody</h1>

                    {!! Form::model($Trips, ['method'=>'post', 'action'=> ['App\Http\Controllers\TripsController@editTripImage', $Trips->id], 'files'=>true]) !!}


                    <input type="hidden" name="id" class="form-control" value="{{$Trips->id}}">

                    <input type="text" class="form-control" value="{{$Trips->trip_title}}" readonly="readonly">
                    <br/>
                    <img class="card-img-top img-fluid" src="{{url('images',$Trips->image)}}" width="150px" alt="Card image cap"/>

                    <br/>
                    Select Image:
                    {{ Form::label('image', 'Image') }}
                {{ Form::file('image',array('class' => 'form-control')) }}


                    <br/>
                    <input type="submit" value="Upload Image" class="btn btn-success pull-right">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {!! Form::close() !!}

</div>


</div>
</div>



@endsection
