@extends('layouts/admin')

@section('content')
<h1>Create Users</h1>

<br>
@include('includes/form_error')
<br>


<form action="/admin/users" method="POST" enctype="multipart/form-data">
    <!-- {{method_field('')}} -->
    {{ csrf_field() }}

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Role</label>
        <select class="form-control" name="role_id">
            <option value="">Choose</option>
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Photo</label>
        <input type="file" name="photo">
    </div>

    <div class="checkbox">
        <label><input type="checkbox" name="is_active" value="1"> Active</label>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection