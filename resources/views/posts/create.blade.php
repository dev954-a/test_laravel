@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div>
                <a class="btn btn-primary" href="/posts">User Posts</a>
            </div>            
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <a class="input-group input-group-sm" href="{{url('posts/create')}}">
                            <button type="button" name="table_search" class="btn btn-success">Create Post</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-3">
        <div class="row">
            <form method="post" action="/posts">
            {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Post</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="Post title" name="title"

                                       @if ($errors->has('title'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('title'))
                                    <span style="color: red">
                                        {{ $errors->first('title') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" type="text" rows="5" cols="5" placeholder="Description" name="description"

                                          @if ($errors->has('description'))
                                          style="border-color: red"
                                        @endif
                                ></textarea>
                                @if ($errors->has('description'))
                                    <span style="color: red">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row" style="text-align: right">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-danger" type="button" onclick="window.history.back()">Cancel</button>
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            </form>
        </div>
    </div>
@endsection
