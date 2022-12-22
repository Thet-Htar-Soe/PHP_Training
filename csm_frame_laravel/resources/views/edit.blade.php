@extends('layouts.app')

@section('content')
<h2>Edit</h2>
<form action="{{url('/update/'.$data->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="task" class="col-sm-3 fw-bold">Task</label>
        <div>
            <input type="text" name="name" id="task-name" class="form-control" value="{{$data->name}}">
        </div>
        @if($errors->any())
        @foreach($errors->all() as $error)
        <small class="text-danger">{{$error}}</small>
        @endforeach
        @endif
    </div>
    <div class="form-group mt-3 d-flex justify-content-between">
        <a href="{{url('/')}}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>

@endsection