@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">           
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
            <div class="box-body table-responsive no-padding">
                @if(isset($posts) && count($posts) > 0)
                    <table class="table table-hover table-responsive table-striped ">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ url('/posts', ['id' => $post->id]) }}" method="post">
                                            <input class="btn btn-danger" type="submit" value="Delete" />
                                            @method('delete')
                                            @csrf
                                        </form>                                        
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    {{ $posts->links() }}
                @else
                    <div>
                        No posts found
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
