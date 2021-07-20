<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FoodSeeder extends Seeder
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
                'name' => '大妈',
                'num' => 1,
                'price' => 3,
            ],
            [
                'name' => '大爷',
                'num' => 4,
                'price' => 30,
            ],
            [
                'name' => '大姐',
                'num' => 10,
                'price' => 9,
            ],
        ];

        DB::table('food')->insert($data);

    }
}
