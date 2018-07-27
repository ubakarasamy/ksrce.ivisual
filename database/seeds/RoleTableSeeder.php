<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $role_employee = new Role();
    $role_employee->name = 'superadmin';
    $role_employee->description = 'Super admin role will have all possibilities to use dashboard for principal';
    $role_employee->save();

    $role_manager = new Role();
    $role_manager->name = 'admin';
    $role_manager->description = 'Admin role preffered for Hod';
    $role_manager->save();

    $role_manager = new Role();
    $role_manager->name = 'staff';
    $role_manager->description = 'Admin role preffered for Staffs';
    $role_manager->save();

    $role_manager = new Role();
    $role_manager->name = 'substaff';
    $role_manager->description = 'Admin role preffered for Sub Staffs';
    $role_manager->save();
    }
}
