<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{

    public function run(): void
    {
        # Permissions
        $permissions = [
            'create new post' ,
            'edit post' ,
            'delete post' ,
            'like on post' ,
            'comment on post' ,
            'report on post' ,
            'manage report' ,
            'manage category',
            'manage tags' ,
            'manage profile' ,
        ];

        foreach ($permissions as $permission) {

            Permission::firstOrCreate(['name' => $permission]);
        }

        # Roles
        $user  = Role::findByName('user');
        $admin = Role::findByName('admin');
        
        # Assign Permission To Role
        $user->givePermissionTo('create new post');
        $user->givePermissionTo('edit post');
        $user->givePermissionTo('delete post');
        $user->givePermissionTo('like on post');
        $user->givePermissionTo('comment on post');
        $user->givePermissionTo('report on post');
        $user->givePermissionTo('manage profile');

        $admin->givePermissionTo('delete post');
        $admin->givePermissionTo('manage report');
        $admin->givePermissionTo('manage category');
        $admin->givePermissionTo('manage tags');
    }
}
