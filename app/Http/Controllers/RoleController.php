<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    public function store(Request $request){
        $inputs = Request()->validate([
            'name'=>['required','string','unique:roles'],
        ]);
        $inputs['name'] = Str::ucfirst($inputs['name'] );
        $inputs['slug'] = Str::of(Str::lower($inputs['name']))->slug('-');
        Role::create($inputs);
        return back();
    }

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

    public function destroy(Role $role){
        $role->delete();
        Session::flash('message', 'The role ' . $role->name . ' was deleted.');
        return back();
    }
}
