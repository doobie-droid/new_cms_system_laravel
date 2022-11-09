<?php

namespace App\Http\Controllers;

use App\Models\Permission;
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
        //the code below says that there is no role to edit at this point
        $role = false;
        $permissions = false;
        return view('admin.roles.index',compact(['roles','role','permissions']));
    }

    public function edit(Role $role){
        $roles = Role::all();
        $permissions = Permission::all();
        //the code below is the same  with index but now, there is a role to edit
        return view('admin.roles.index',compact(['roles','role','permissions']));
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

    public function update(Role $role){
        $inputs = Request()->validate([
            'name'=>['required','string','unique:roles'],
        ]);
        $role->name= Str::ucfirst($inputs['name'] );
        $role->slug = Str::of(Str::lower($inputs['name']))->slug('-');
        $role->update();
        Session::flash('update', 'The role ' . $role->name . ' has been updated.');

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
