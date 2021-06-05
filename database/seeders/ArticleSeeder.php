<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $i) {

            $imageNumber = $faker->numberBetween($min = 1, $max = 10);
            $imagePath = 'image' . $i . '.jpg';

            DB::table('articles')->insert([
                'title' => $faker->text($maxNbChars = 30),
                'summary' => $faker->text($maxNbChars = 100),
                'text' => $faker->text($maxNbChars = 2000),
                'image_path' => $imagePath,
                'category_id' => $faker->numberBetween($min = 1, $max = 2),
                'owner_id' => 1,
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}