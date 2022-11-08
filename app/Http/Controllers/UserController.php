<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //

    public function index(User $user){
        $this->authorize('view',$user);
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.users.profile',compact(['user','roles']));
    }

    public function update(User $user){
//        $this->authorize('view',$user);
        $inputs = request()->validate([
            'username'=>['required','string','max:255','alpha_dash','unique:users'],
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255'],
            'avatar'=>'file',
            'password'=>['required', 'string', 'min:8', 'confirmed'],
        ]);
        $inputs['password'] = Hash::make($inputs['password']);
        if(request('avatar')){
            $inputs['avatar']=request('avatar')->store('images');
        }
        $user->update($inputs);
        return back();
    }

    public function destroy(User $user){
        $user->delete();
        Session::flash('message', 'The user with name ' . $user->name . 'was deleted.');
        return back();
    }
}
