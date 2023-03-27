<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class permissionController extends Controller
{
     public function index(){
        if(auth()->user()->can('view')){
        $permissions=Permission::get();
        return view('layouts.permissions',compact('permissions'));
        }
        else{
            return view('layouts.blank');
        }
    }
    public function create(){
        if(auth()->user()->can('create')){
        return view('layouts.add_permission');
        }
        else{
            return view('layouts.blank');
        }
    }
     public function insert(Request $request)
    {
        if(auth()->user()->can('create')){
        $validate=$request->validate([
            'name'=>'required'
        ]);
        $permissions = Permission::create(['name' => $request->input('name')]);
       // $role->syncPermissions($request->input('permission'));
        return redirect()->route('permissions');
        }
        else{
        return view('layouts.blank');
        }
    }
       public function edit($id){
        if(auth()->user()->can('edit')){
           $permission=Permission::find($id);
          return view('layouts.edit_permission',compact('permission'));
           }
           else{
        return view('layouts.blank');
        }

        }
        public function update(Request $request,$id){
            if(auth()->user()->can('edit')){
                $permission=Permission::find($id);
                $permission->name = $request->input('name');
                $permission->update();
                return redirect()->route('permissions');
        }
        else{
            return view('layouts.blank');
        }
    }
      public function delete(Request $request,$id){
        if(auth()->user()->can('delete')){
            $permission=Permission::where('id',$id)->delete($id);
            return redirect()->route('permissions');
     }
     else{
        return view('layouts.blank');
        }
    }
}
