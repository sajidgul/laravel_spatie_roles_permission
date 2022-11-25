<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'writer']);
        Permission::create(['name'=>'write post']);
        Role::create(['name'=>'editor']);
        Permission::create(['name'=>'edit post']);
        Role::create(['name'=>'publisher']);
        Permission::create(['name'=>'publish post']);
        Role::create(['name'=>'admin']);

        $role1 = Role::find(1);
        $permission1 = Permission:: find(1);

        $role2 = Role::find(2);
        $permission2 = Permission:: find(2);

        $role3 = Role::find(3);
        $permission3 = Permission:: find(3);

        $role4 = Role::find(4);
        $permission1 = Permission:: find(1);

        $role4 = Role::find(4);
        $permission2 = Permission:: find(2);

        $role4 = Role::find(4);
        $permission3 = Permission:: find(3);


        
        $role1->givePermissionTo($permission1);
        $role2->givePermissionTo($permission2);
        $role3->givePermissionTo($permission3);
        $role4->givePermissionTo($permission1);
        $role4->givePermissionTo($permission2);
        $role4->givePermissionTo($permission3);

    }
}
