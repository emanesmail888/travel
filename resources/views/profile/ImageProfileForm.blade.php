
@extends('front.master')


@section('content')
<h1 class="pt-5 ">Update Profile Picture</h1>

    <div class="row">
        <div class="container mb-5 pb-5 d-block align-content-center">





            <div class="col-md-6">

                {!! Form::model($user, [
                    'method' => 'post',
                    'action' => ['App\Http\Controllers\ProfileController@editProfileImage', $user->id],
                    'files' => true,
                ]) !!}


                <input type="hidden" name="id" class="form-control" value="{{ $user->id }}">

                <input type="text" class="form-control" value="{{ $user->name }}" readonly="readonly">
                <br />
                <img class="card-img-top img-fluid w-25 h-25" src="{{ url('uploads/avatars', $user->avatar) }}"
                    alt="Card image cap" />

                <br />
                Select Image:
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image', ['class' => 'form-control']) }}


                <br />
                <input type="submit" value="Upload Image" class="btn btn-success pull-right">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {!! Form::close() !!}

            </div>


        </div>
    </div>
@endsection
