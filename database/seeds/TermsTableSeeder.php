<?php

use Illuminate\Database\Seeder;

class TermsTableSeeder extends Seeder
{
    public function run()
    {
        Term::query()->delete();
        Term::create(array('name' => '1st'));
        Term::create(array('name' => '2nd'));
        Term::create(array('name' => '3rd'));
    }
}
