<?php

use Illuminate\Database\Seeder;
use App\Models\Categories;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData() {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        $categoriesCount = Categories::query()->count('id');

        for ($i = 0; $i < 60; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10, 40)),
                'text' => $faker->realText(rand(500, 4000)),
                'category_id' => $faker->numberBetween(1,$categoriesCount)
            ];
        }

        return $data;
    }
}
