<?php

use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusTableSeeder extends Seeder
{
        public function run()
        {
                MaritalStatus::query()->delete();
                MaritalStatus::create(array('status' => 'Single'));
                MaritalStatus::create(array('status' => 'Married'));
                MaritalStatus::create(array('status' => 'Seperated'));
                MaritalStatus::create(array('status' => 'Divorced'));
                MaritalStatus::create(array('status' => 'Widowed'));
        }
}