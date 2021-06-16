<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('courses') -> insert([
            'course_code' => 'CSC301S3',
            'course_name' => 'Computerscience',
            'course_level' => '3S',
            'lect_id' => '1',
            'assistant_lect_id' => '2',
        ]);
    }
}
