@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">           
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <a class="input-group input-group-sm" href="{{url('home')}}">
                            <button type="button" name="table_search" class="btn btn-success">Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-3">
        <div class="row">
            <div class="box-body table-responsive no-padding">
                @if(isset($post))
                    <table class="table table-hover table-responsive table-striped ">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                        </tr>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
