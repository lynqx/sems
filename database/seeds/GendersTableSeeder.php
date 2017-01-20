<?php

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    public function run()
    {
        Gender::query()->delete();
        Gender::create(array('name' => 'Male'));
        Gender::create(array('name' => 'Female'));
    }
}