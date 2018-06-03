<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
          ['id' => 1, 'name' => 'root', 'display_name' => 'Root'],
          ['id' => 2, 'name' => 'admin', 'display_name' => 'Admin'],
        ];

        foreach ($roles as $role) {
          Role::create($role);
        }
    }
}
