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
        Criteria::create(array('criteria' => 'Core'));
        Criteria::create(array('criteria' => 'Compulsory'));
        Criteria::create(array('criteria' => 'Required'));
        Criteria::create(array('criteria' => 'Electives'));
        Criteria::create(array('criteria' => 'Choice'));
    }
}
