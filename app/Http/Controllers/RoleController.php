<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.index',compact('roles','permissions'));
    }

    public function store(Request $request){
        $roles = new Role;
        $roles -> name = $request['name'];
        $roles -> syncPermissions($request->permissions);
        $roles -> save();
        return redirect('/user/roles');
    }

    public function edit($id){
        $roles = Role::find($id);
        $permissions = Permission::all();
        return view('roles.edit',compact('roles','permissions'));
    }

    public function update(Request $request, $id){
        $roles = Role::find($id);
        $roles -> name = $request['name'];
        $roles -> syncPermissions($request->permissions);
        $roles -> save();
        return redirect('/user/roles');
    }

    public function delete($id){
        $roles = Role::find($id);
        $roles->delete();
        return redirect('/user/roles');
    }
}
