<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_has_permissions')->insert([
            'permission_id' => 1,
            'role_id' => 1
        ]);

        DB::table('role_has_permissions')->insert([
            'permission_id' => 2,
            'role_id' => 1
        ]);

        DB::table('role_has_permissions')->insert([
            'permission_id' => 3,
            'role_id' => 2
        ]);
    }
}
