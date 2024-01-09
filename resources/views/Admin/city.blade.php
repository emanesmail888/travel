@extends('admin.master')
@section('content')



    {{-- <canvas class="my-4 w-100"  width="100" height="2"></canvas> --}}

<div class="row">

<div class="col-md-6">

<h1>Cities</h1>

<table class="table" style="">
            <thead>
                <tr>

                    <th>City Title</th>

                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>

            @foreach($cities as $city)

            <tr>
                <td style="width:150px; "><a href="{{route('city.show',$city->id)}}">

                     {{$city->name}}</a></td>
                     <td style="width:100px; "> Edit</td>




            {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\CityController@destroy', $city->id]]) !!}


                <td style="width:150px; ">  {!! Form::submit('Delete City', ['class'=>'btn btn-danger col-sm-12']) !!}</td>



                {!! Form::close() !!}

    </tr>
              @endforeach


            </tbody>
    </table>


</div><!-- col-md-6 -->


      <div class="col-md-4">

        <br>

           <div class="card card-body card1  text-white py-5">
       <h2>Create City</h2>
       <p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the</p>
          {!! Form::open(['route' => 'city.store', 'method' => 'post' ]) !!}
            <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>




        <button type="submit" class="btn  mx-auto go d-block ">Add City</button>

          {!! Form::close() !!}

     </div>
    </div>




@endsection
