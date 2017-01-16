<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->call(TitleTableSeeder::class);
        $this->call(MaritalStatusTableSeeder::class);
    }
}
