
@extends('layouts.app')
@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row m-0">
    <form  method="POST" class="pl-5" action='/posts/{{$post->id}}'>
    {{ csrf_field() }}

    <div class="form-group">
        <label for="Title">Title</label>
        <input type="text" class="form-control" id='Title' name='title' value = {{$post->title}}>
    </div>
    <div class="form-group">
        <label for="Description">Description</label>
        <input type="text" class="form-control" id='Description' name='description' value = {{$post->description}}>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>	
@endsection