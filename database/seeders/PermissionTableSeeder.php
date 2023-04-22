<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'post-list',
           'post-read',
           'post-write',
           'post-create',
           'post-delete',
           'post-edit',
           'user-list',
           'user-delete',
           'user-read',
           'user-write',
           'user-create',
           'user-edit',
        ];     

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

    }

}