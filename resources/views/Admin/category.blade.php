@extends('admin.master')
@section('content')



    {{-- <canvas class="my-4 w-100"  width="100" height="2"></canvas> --}}

<div class="row">

<div class="col-md-6">

<h1>Categories</h1>

<table class="table" style="">
            <thead>
                <tr>

                    <th>Category Title</th>
                    <th>CImage</th>

                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>

            @foreach($categories as $category)

            <tr>
                <td style="width:150px; "><a href="{{route('category.show',$category->id)}}">

                     {{$category->title}}</a></td>


         <td style="width:150px; " ><img class="w-25" src="{{url('images',$category->image)}}"  alt="Card image cap"></td>
                                    <td style="width:100px; "> Edit</td>



            {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\CategoriesController@destroy', $category->id]]) !!}


                <td style="width:150px; ">  {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-12']) !!}</td>



                {!! Form::close() !!}

    </tr>
              @endforeach


            </tbody>
    </table>


</div><!-- col-md-6 -->


      <div class="col-md-4">

        <br>

           <div class="card card-body card1  text-white py-5">
       <h2>Create Category</h2>
       <p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the</p>
          {!! Form::open(['route' => 'category.store', 'method' => 'post' ,'files' => true]) !!}
            <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image',array('class' => 'form-control')) }}

                 <span style="color:red">{{ $errors->first('image') }}</span>

            </div>


        <button type="submit" class="btn go d-block mx-auto ">Add Category</button>

          {!! Form::close() !!}

     </div>
    </div>



@endsection
