<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = Role::where('name', 'superadmin')->first();
    $role_admin  = Role::where('name', 'admin')->first();
    $role_staff  = Role::where('name', 'staff')->first();

    $superadmin = new User();
    $superadmin->name = 'Super Admin';
    $superadmin->email = 'superadmin@app.com';
    $superadmin->password = bcrypt('password');
    $superadmin->save();
    $superadmin->roles()->attach($role_superadmin);

    $admin = new User();
    $admin->name = 'Admin';
    $admin->email = 'admin@app.com';
    $admin->password = bcrypt('password');
    $admin->save();
    $admin->roles()->attach($role_admin);

    $staff = new User();
    $staff->name = 'Staff';
    $staff->email = 'staff@app.com';
    $staff->password = bcrypt('password');
    $staff->save();
    $staff->roles()->attach($role_staff);
    }
}
