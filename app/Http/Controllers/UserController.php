<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(User $user)
    {
        return view('admin.users.profile',compact('user'));
    }
}
