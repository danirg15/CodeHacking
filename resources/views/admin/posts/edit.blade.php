@extends('layouts/admin')



@section('content')

<h1>Edit Post</h1>

<br>
@include('includes/form_error')
<br>

{!! Form::model($post,['method'=>'PUT', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
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

{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete', ['class'=>'btn btn-danger pull-right col-sm-2']) !!}
        </div>
{!! Form::close() !!}


@endsection