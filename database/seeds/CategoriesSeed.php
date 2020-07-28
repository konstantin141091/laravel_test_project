<?php

use Illuminate\Database\Seeder;

class CategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'sport',
                'title' => 'спорт'
            ],
            [
                'name' => 'life',
                'title' => 'жизнь'
            ],
            [
                'name' => 'policy',
                'title' => 'политика'
            ],
            [
                'name' => 'finance',
                'title' => 'финансы'
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
