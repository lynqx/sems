<?php

use App\Models\BookCondition;
use Illuminate\Database\Seeder;

class BookConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookCondition::query()->delete();
        BookCondition::create(array('condition' => 'New'));
        BookCondition::create(array('condition' => 'Good'));
        BookCondition::create(array('condition' => 'Fair'));
        BookCondition::create(array('condition' => 'Poor'));
        BookCondition::create(array('condition' => 'Missing'));
        BookCondition::create(array('condition' => 'Lost'));
    }
}
