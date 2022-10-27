<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function show (Post $post){

      //the post_id up there must have the same name as the variable that was used to hold the post id in the
        //route file.
        return view('layouts.blog-post',compact('post'));
    }

    public function create(){

        return view('posts.create');
    }
}
