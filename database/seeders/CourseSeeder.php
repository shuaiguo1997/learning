<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'class_name' => '语文',
                't_id' => 1,
            ],
            [
                'class_name' => '数学',
                't_id' => 1,
            ],
            [
                'class_name' => '英语',
                't_id' => 2,
            ],
            [
                'class_name' => '音乐',
                't_id' => 2,
            ],
            [
                'class_name' => '美术',
                't_id' => 2,
            ],
        ];

        DB::table('course')->insert($data);
    }
}
