@extends('layouts/admin')

@section('content')
<h1>Create Users</h1>

<br>
@include('includes/form_error')
<br>

{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

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
        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    </div>
    
{!! Form::close() !!}



@endsection