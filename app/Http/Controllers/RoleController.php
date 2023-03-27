<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//Auth::user() & auth()->user() works same but Auth:: won't work in edit,delte,update function
class RoleController extends Controller
{
    public function index(){
        if(auth()->user()->can('view')){
        $roles=Role::get();
        return view('layouts.roles',compact('roles'));
        }
        else{
            return view('layouts.blank');
        }
    }
    public function create(){
        if(auth()->user()->can('create')){
            $permissions=Permission::get();
            return view('layouts.add_role',compact('permissions'));
        }
        else{
            return view('layouts.blank');
        }
    }
     public function insert(Request $request){
        if(auth()->user()->hasPermissionTo('create') ){
            $validate=$request->validate([
                'name'=>'required'
            ]);
            $role = Role::create(['name' => $request->input('name')]);
            $role->givepermissionTo($request->input('permission'));
            $role->save();
            return redirect()->route('roles');
        }
        else{
            return view('layouts.blank');
        }
    }
    public function delete($id){
        if(auth()->user()->can('delete')){
            $role=Role::where('id',$id)->delete($id);
            return redirect()->route('roles');
         }
         else{
            return view('layouts.blank');
         }
    }

    public function edit($id){
        if(auth()->user()->can('edit')){
            $role=Role::find($id);
            $permissions=Permission::all();
            //return $role->permissions;
            return view('layouts.edit_role',compact('role','permissions'));
            }
            else{
                return view('layouts.blank');
            }
    }
    public function update(Request $request,$id){
        if(auth()->user()->can('edit')){
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->syncPermissions($request->input('permission'));
            $role->update();
            return redirect()->route('roles');
            }
            else{
                return view('layouts.blank');
            }

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
