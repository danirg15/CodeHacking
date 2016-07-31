@extends('layouts/admin')



@section('content')

<h1>Create Post</h1>

<br>
@include('includes/form_error')
<br>

{!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
    <div class='form-group'>
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('photo', 'Photo') !!}
        {!! Form::file('photo', null, ['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('body', 'Content') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit('Submit', ['class'=>'btn btn-primary col-sm-2', 'rows'=>3]) !!}
    </div>
{!! Form::close() !!}


@endsection