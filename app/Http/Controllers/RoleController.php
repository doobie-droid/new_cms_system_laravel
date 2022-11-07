<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //

    public function attach(User $loggedinuser){
        $this->authorize('view',$loggedinuser);
        $usertoEdit = User::find(request()->user_id);
        $usertoEdit->roles()->attach(Role::find(request()->role_id));
        return back();
    }

    public function detach(User $loggedinuser){
        $this->authorize('view',$loggedinuser);
        $usertoEdit = User::find(request()->user_id);
        $usertoEdit->roles()->detach(Role::find(request()->role_id));
        return back();

    }
}
