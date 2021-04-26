@extends('layouts.app')
@section('content')
<div class="container pt-3">
        <div class="row">
            <div class="box-body table-responsive no-padding">
                @if(isset($posts) && count($posts)>0)
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
@endsection