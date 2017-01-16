<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::query()->delete();
        Role::create(array('role' => 'Admin'));
        Role::create(array('role' => 'Parents'));
        Role::create(array('role' => 'Students'));
        Role::create(array('role' => 'Teachers'));
    }
}