<?php

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::query()->delete();
        Criteria::create(array('name' => 'Core'));
        Criteria::create(array('name' => 'Compulsory'));
        Criteria::create(array('name' => 'Required'));
        Criteria::create(array('name' => 'Electives'));
        Criteria::create(array('name' => 'Choice'));
    }
}
