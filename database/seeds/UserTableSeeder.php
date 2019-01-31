<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_manager  = Role::where('name', 'manager')->first();
        $role_customer  = Role::where('name', 'customer')->first();

        $admin = new User();
        $admin->name = 'Admin Name';
        $admin->surname = 'Admin surname';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $manager = new User();
        $manager->name = 'Manager Name';
        $manager->surname = 'Manager surname';
        $manager->email = 'manager@manager.com';
        $manager->password = bcrypt('manager');
        $manager->save();
        $manager->roles()->attach($role_manager);

        $customer = new User();
        $customer->name = 'customer Name';
        $customer->surname = 'customer surname';
        $customer->email = 'customer@customer.com';
        $customer->password = bcrypt('customer');
        $customer->save();
        $customer->roles()->attach($role_customer);
    }
}
