<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0;$i<5;$i++)
        {
            \App\Category::create(array(
                'category'=>$faker->sentence(1),
            ));
        }
    }
}
