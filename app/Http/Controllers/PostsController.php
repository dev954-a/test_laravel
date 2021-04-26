<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show($id)
    {
        $post = Post::where('id',$id)->first();
        return view('posts.show',compact('post'));
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'user_id' => Auth()->user()->id
        ];
        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $posts = Post::create($data)->get();
        return view('home', compact('posts'));
    }
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->to('/home');
    }

    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        return view('posts.edit',['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ];
        $rules = [
            'title' => 'required',
            'description' => 'required'
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        Post::where('id', $id)->update($data);
        return redirect()->to('/home');
    }
}
