<?php

use App\Models\ExamType;
use Illuminate\Database\Seeder;

class ExamTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamType::query()->delete();
        ExamType::create(array('exam' => '1st CA'));
        ExamType::create(array('exam' => '2nd CA"'));
        ExamType::create(array('exam' => '3rd CA'));
        ExamType::create(array('exam' => 'Mid-Term Test'));
        ExamType::create(array('exam' => 'Final Exam'));
    }
}
