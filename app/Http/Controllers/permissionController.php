<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class permissionController extends Controller
{
     public function index(){
        $permissions=Permission::get();
        return view('layouts.permissions',compact('permissions'));
    }
    public function create(){
        return view('layouts.add_permission');
    }
     public function insert(Request $request)
    {
        $permissions = Permission::create(['name' => $request->input('name')]);
       // $role->syncPermissions($request->input('permission'));
        return redirect()->route('permissions');
    }
   public function edit($id){
       $permission=Permission::find($id);
      return view('layouts.edit_permission',compact('permission'));
    }
    public function update(Request $request,$id){
        $permission=Permission::find($id);
        $permission->name = $request->input('name');
        $permission->update();
        return redirect()->route('permissions');
    }
      public function delete(Request $request,$id){
        $permission=Permission::where('id',$id)->delete($id);
         return redirect()->route('permissions');
    }
}
