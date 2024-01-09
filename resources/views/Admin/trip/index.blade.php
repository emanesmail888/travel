
 @extends('admin.master')


 @section('content')



  <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
   <h3>Trips</h3>








      <!-- INVERSE/DARK TABLE -->
         <table class="table table-dark">
             <thead>
                 <tr>
                     <th>Image</th>

                     <th>Trip Id</th>
                     <th>Trip Title</th>
                     <th>Trip Price</th>
                     <th>Season</th>
                     <th>Category Id</th>
                     <th>Duration</th>
                     <th>Edit</th>
                     <th>Delete</th>
                 </tr>
             </thead>

             <tbody>


                <?php $count =1;?>
                @foreach($Trips as $trip)


                 <tr>
                     <td style="width:50px; border: 1px solid #333;"><img class="card-img-top img-fluid" src="{{url('images',$trip->image)}}" width="50px" alt="Card image cap"/></td>


                     <td style="width:50px;">{{$trip->id}} </td>

                     <td style="width:50px;">{{$trip->trip_title}} </td>
                     <td style="width:50px;">{{$trip->trip_price}} </td>
                     <td style="width:50px;">{{$trip->season}}  </td>
                     <td style="width:50px;">{{$trip->category_id}}</td>
                     <td style="width:50px;">{{$trip->duration}}</td>




                     <td><a href="{{route('TripEditForm',$trip->id)}}" class="btn btn-success btn-small">Edit</a></td>


                    {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\TripsController@destroy', $trip->id]]) !!}


                   <td>  {!! Form::submit('Delete Trip', ['class'=>'btn btn-danger col-sm-6']) !!}</td>



                   {!! Form::close() !!}

                 </tr>

<?php $count++;?>
                 @endforeach


             </tbody>

         </table>


 </main>



  @endsection
