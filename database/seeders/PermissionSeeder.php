<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission::create(['name' => 'product edit']);
        // Permission::create(['name' => 'product delete']);
         //Permission::create(['name' => 'product add']);
          //app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role_employee=User::where('name','test')->first();
        //$role_employee->assignRole('employee');
        $role_employee->givePermissionTo('product delete');
    }
}
