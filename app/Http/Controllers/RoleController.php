<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    public function index(){
       $roles=Role::get();
        return view('layouts.roles',compact('roles'));
    }
    public function create(){
        $permissions=Permission::get();
        return view('layouts.add_role',compact('permissions'));
    }
     public function insert(Request $request){
       $role = Role::create(['name' => $request->input('name')]);
        $role->givepermissionTo($request->input('permission'));
        $role->save();
        return redirect()->route('roles');
    }
    public function delete(Request $request,$id){
        $role=Role::where('id',$id)->delete($id);
         return redirect()->route('roles');
    }
    public function edit($id){
        $role=Role::find($id);
        $permissions=Permission::all();
        return view('layouts.edit_role',compact('role','permissions'));
    }
    public function update(Request $request,$id){
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->syncPermissions($request->input('permission'));
        $role->update();
        return redirect()->route('roles');
    }
    public function permission($id){
         $permissions=Permission::all();
          // $role=Role::with('permissions')->where('id',$id)->first();
         $role=Role::where('id',$id)->first();
         return view('role_permission',compact('role','permissions'));
    }
    public function addpermission(Request $request,$id){
        $role = Role::find($id);
        //$permissions=Permission::all();
        //$role->name = $request->input('name');
        // $role['permission']=$request->input('permission');
        $role->syncPermissions($request->input('permission'));
        $role->save();
        return redirect()->route('roles');
    }

}
