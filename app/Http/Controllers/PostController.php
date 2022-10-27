<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }
    public function show (Post $post){

      //the post_id up there must have the same name as the variable that was used to hold the post id in the
        //route file.
        return view('layouts.blog-post',compact('post'));
    }

    public function create(){

        return view('posts.create');
    }
    public function store(Request $request)
    {
        $inputs = Request()->validate([
            'title'=>'bail|required|unique:posts|min:8',
            'post_image'=> 'mimes:jpg,bmp,png',
            'body'=>'bail|required|min:30'
        ]);
        if(Request('post_image')){
            $inputs['post_image'] = Request('post_image')->store('images');

        }
        auth()->user()->posts()->create($inputs);

        return back();
    }
}
