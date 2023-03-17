<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$role=Role::create(['name'=>'write']);
       //Permission::create('name'=>'permissionm');
       //$role->revokePermissionTo($permission);
       //$permission=Permission::findById(1);
        // $role=Role::findById(1);
       // $permission->assignRole($role);
       // $all_users_with_all_their_roles = User::with('roles')->get();
        //return $all_users_with_all_direct_permissions = User::with('permissions')->get();
      // return $all_roles_in_database = Permission::all()->pluck('name');
      // return $users_without_any_roles = User::doesntHave('roles')->get();
      //return $all_roles_except_a_and_b = Role::whereNotIn('name', ['admin', 'writer'])->get();
       // $user=User::find(1);
         //$user->givePermissionTo('write');
       // $user->assignRole('writer');
       // $user->getPermissionsViaRoles('write');
      //   // return $role=Role::where('name','writer')->get();
      // $user=Auth()->user();
      //   $user=Role::find(5);
      //    if($user->hasPermissionTo('edit articles'))
      //    {
      //       echo "HAs Permission";
      //    }
      //    else
      //    {
      //       echo "Does not";
      //    }

        $user=User::Where('name','test2')->first();
        $user->assignRole('writer');
        return view('home');
    }
}
