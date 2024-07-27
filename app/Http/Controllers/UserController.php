<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $user = User::all();
        $roles = Role::all();
        return view('users.index',compact('user','roles'), ['users' => $model->paginate(15)]);
    }

    public function store(Request $request){
        $user = new User;
        $user -> name=$request['name'];
        $user -> email=$request['email'];
        $user -> password = Hash::make($request['password']);
        $user -> save();
        $roleIds = $request['roles'];
        $roles = Role::where('id', $roleIds)->get();
        $user->roles()->attach($roles);
        return redirect('user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user -> name = $request['name'];
        $user -> email = $request['email'];
        $user -> password = Hash::make($request['password']);
        $user -> save();
        $roleIds = $request['roles'];
        $roles = Role::where('id', $roleIds)->get();
        $user -> roles() -> sync($roles);
        return redirect('user');
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect('user');
    }
}
