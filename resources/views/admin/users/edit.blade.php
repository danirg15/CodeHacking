@extends('layouts/admin')

@section('content')
<h1>Edit User</h1>

<br>
@include('includes/form_error')
<br>

<div class="col-sm-3">
    <img src="{{$user->photo->path or App\Photo::getPlaceholderImage()}}" class="img-responsive img-circle" alt="">
</div>

<div class="col-sm-9">
    {!! Form::model($user ,['method'=>'PUT', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo', 'Photo') !!}
            {!! Form::file('photo', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::checkbox('is_active', 1) !!}
            {!! Form::label('is_active', 'Active') !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary col-sm-2']) !!}
        </div>
        
    {!! Form::close() !!}


    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-offset-1 col-sm-2']) !!}
        </div>
    {!! Form::close() !!}

</div>


@endsection