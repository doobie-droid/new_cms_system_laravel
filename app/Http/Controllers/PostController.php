<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index(){
        $posts = auth()->user()->posts;
        return view('posts.index',compact('posts'));
    }
    public function show (Post $post){

      //the post_id up there must have the same name as the variable that was used to hold the post id in the
        //route file.
        return view('layouts.blog-post',compact('post'));
    }
    public function edit(Post $post){

        return view('posts.edit',compact('post'));
    }
    public function create(){

        return view('posts.create');
    }

    public function update(Post $post){
        //use the first method here when there's no image or video handling carried out separately
//        $post->update( Request()->validate([
//            'title'=>'bail|required|min:8',
//            'post_image'=> 'mimes:jpg,bmp,png',
//            'body'=>'bail|required|min:30'
//        ]));

        //second method which changes the owner of the records
//        $post = new Post();
//        $post->title = request('title');
//        auth()->user()->posts()->save($post);
        $inputs = Request()->validate([
            'title'=>'bail|required|unique:posts|min:8',
            'post_image'=> 'mimes:jpg,bmp,png',
            'body'=>'bail|required|min:30'
        ]);
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];


        if(Request('post_image')){
            $inputs['post_image'] = Request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->update();

        return redirect()->route('post.index');
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
        Session::flash('creation_message','A new post was just created.');
        return redirect()->route('post.index');
    }

    public function destroy(Post $post){

        $post->delete();
        Session::flash('message','The post with title '.$post->title.'was deleted.');
        return back();

    }
}
