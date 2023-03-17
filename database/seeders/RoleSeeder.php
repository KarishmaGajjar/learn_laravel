<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $role_writer=Role::create(['name'=>'writer']);
        // $role_admin=Role::create(['name'=>'admin']);
        // $role_superadmin=Role::create(['name'=>'super-admin']);
        // $role_writer=Role::where('name','writer')->get();
        // $role_writer->givePermissionTo('edit articles','publish articles');
       // $role_admin->givePermissionTo('edit articles','delete articles','publish articles');
       $role=Role::create(['name'=>'employee']);
      // $role->givePermissionTo('edit articles');
    }
}
