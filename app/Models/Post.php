<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user() {
        return $this ->belongsTo(User::class);
    }
    public function setPostImageAttribute($value){

        $this->attributes['post_image'] = asset('storage/'.$value);
    }
    public function getPostImageAttribute($value){
        //the code below checks if the beginning part of the imageurl starts with image and changes the url
        //so that the images can be displayed
        $imageurl = substr($value, 0, 6);
        if ($imageurl=='images'){
            return asset('storage/'.$value);
        }else{
            return $value;
        }
    }
}
