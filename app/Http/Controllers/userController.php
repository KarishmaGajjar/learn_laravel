<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\DataTables\UsersDataTable;
use DB;
class userController extends Controller
{
      public function index(UsersDataTable $dataTable){
          return $dataTable->render('users');
        }
        public function create(){
            if(Gate::allows('add-user')){
                return view('user_insert');
            }
            else{
             return redirect('error');
            }
        }
        public function delete(Request $request,$id){
             if(Gate::denies('delete-user')){
               return redirect('error');
             }
             else{
                  $user=User::where('id',$id)->delete($id);
                  return redirect()->route('users');
             }
        }
        public function insert(Request $request){
            if(auth()->user()->hasPermissionTo('create')){
                 $validate=$request->validate([
                 'name'=>'required',
                 'email'=>'required|email|unique:users',
                 'password'=>'required'
                ],[
                    'name.required'=>'Name is required',
                    'email.required'=>'Email is required',
                    'email.unique'=>'This email is already registered.Please enter unique email',
                     'password.required'=>'Password is required',
                ]);
                $user=User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
             ]);
            return redirect()->route('users');
        }
         else{
            return view('layouts.blank');
        }
    }
     public function assign_role(Request $request,$id){
          $user=User::where('id',$id)->first();
          $user->syncRoles($request->input('role'));
          $user->save();
          return redirect()->route('users');
    }
    public function roles($id){
       if(auth()->user()->can('assign role')||auth()->user()->hasRole('admin')){
           $user=User::find($id);
           $roles=Role::get();
           return view('assign_role',compact('user','roles'));
        }
         else{
            return view('layouts.blank');
        }
    }
      public function permissions($id){
       if(auth()->user()->can('assign permission')||auth()->user()->hasRole('admin')){
             $user=User::find($id);
             $permissions=Permission::all();
              $user->getPermissionsViaRoles();
              //return $user->getAllPermissions();->gets all direct or inherited permission from user
             $has_permission=DB::table('model_has_permissions')->where('model_id',$id)->get();
             //return $has_permission[1]->permission_id;
            //$user->permissions;
          return view('assign_permission',compact('user','permissions','has_permission'));
        }
        else{
            return view('layouts.blank');
        }
    }
    public function assign_permission(Request $request,$id){
          $user=User::where('id',$id)->first();
          $user->syncPermissions($request->input('permission'));
          $user->save();
          return redirect()->route('users');
    }
    public function edit($id){
       if(auth()->user()->can('edit')){
       $user=User::find($id);
       return view('user_edit',compact('user'));
     }
      else{
            return view('layouts.blank');
        }
    }
    public function update(Request $request,$id){
       if(auth()->user()->hasPermissionTo('edit')){
        $user=User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();
        return redirect()->route('users');
        }
    }

}
