<?php

use App\Models\Title;
use Illuminate\Database\Seeder;

class TitleTableSeeder extends Seeder
{
    public function run()
    {
        Title::query()->delete();
        Title::create(array('title' => 'Ms'));
        Title::create(array('title' => 'Miss'));
        Title::create(array('title' => 'Mr'));
        Title::create(array('title' => 'Mrs'));
        Title::create(array('title' => 'Alhaji'));
        Title::create(array('title' => 'Alhaja'));
        Title::create(array('title' => 'Comrade'));
        Title::create(array('title' => 'Pastor'));
    }
}