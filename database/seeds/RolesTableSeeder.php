<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::query()->delete();
        Role::create(array('name' => 'Admin'));
        Role::create(array('name' => 'Parents'));
        Role::create(array('name' => 'Students'));
        Role::create(array('name' => 'Teachers'));
    }
}