<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class userController extends Controller
{
      public function index(){
        $users=User::with('permissions')->get();
        return view('layouts.user',compact('users'));
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
     public function assign_role(Request $request,$id){
          $user=User::where('id',$id)->first();
          $user->assignRole($request->input('role'));
         $user->save();
        return redirect()->route('roles');
    }
    public function roles($id){
       $user=User::find($id);
       $roles=Role::get();
      return view('assign_role',compact('user','roles'));
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
