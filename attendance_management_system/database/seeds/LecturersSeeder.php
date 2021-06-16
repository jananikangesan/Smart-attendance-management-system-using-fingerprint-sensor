<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lecturers') -> insert([
            'lect_title'  =>'Mr.',
            'lect_name' => 'srijathee',
            'lect_email' => 'srijathee@gmail.com',
            'position' => 'HOD,lecturer',
        ]);

        DB::table('lecturers') -> insert([
            'lect_title'  =>'Mr.',
            'lect_name' => 'abc',
            'lect_email' => 'abc@gmail.com',
            'position' => 'lecturer',
        ]);

        DB::table('lecturers') -> insert([
            'lect_title'  =>'Miss.',
            'lect_name' => 'pqr',
            'lect_email' => 'pqr@gmail.com',
            'position' => 'assistentlecturer',
        ]);

    }
}
