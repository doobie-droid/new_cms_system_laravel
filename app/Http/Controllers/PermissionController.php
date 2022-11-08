<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index(){
        $permissions = Permission::all();
        //the code below says that there is no permission to edit at this point
        $permission = false;
        return view('admin.permissions.index',compact(['permissions','permission']));
    }

    public function edit(Permission $permission){
        $permissions = Permission::all();
        //the code below is the same  with index but now, there is a permission to edit
        return view('admin.permissions.index',compact(['permissions','permission']));
    }


    public function store(Request $request){
        $inputs = Request()->validate([
            'name'=>['required','string','unique:permissions'],
        ]);
        $inputs['name'] = Str::ucfirst($inputs['name'] );
        $inputs['slug'] = Str::of(Str::lower($inputs['name']))->slug('-');
        Permission::create($inputs);
        return back();
    }

    public function update(Permission $permission){
        $inputs = Request()->validate([
            'name'=>['required','string','unique:permissions'],
        ]);
        $permission->name= Str::ucfirst($inputs['name'] );
        $permission->slug = Str::of(Str::lower($inputs['name']))->slug('-');
        $permission->update();
        Session::flash('update', 'The permission ' . $permission->name . ' has been updated.');

        return back();
    }
    public function destroy(Permission $permission){
        $permission->delete();
        Session::flash('message', 'The permission ' . $permission->name . ' was deleted.');
        return back();
    }
}
