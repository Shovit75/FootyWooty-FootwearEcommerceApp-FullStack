<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    public function store(Request $request){
        $permissions = new Permission;
        $permissions -> name = $request['name'];
        $permissions -> save();
        return redirect('/user/permissions');
    }

    public function edit($id){
        $permissions = Permission::find($id);
        return view('permissions.edit',compact('permissions'));
    }

    public function update(Request $request, $id){
        $permissions = Permission::find($id);
        $permissions -> name = $request['name'];
        $permissions -> save();
        return redirect('/user/permissions');
    }

    public function delete($id){
        $permissions = Permission::find($id);
        $permissions->delete();
        return redirect('/user/permissions');
    }
}
