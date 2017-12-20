<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        for($i=0;$i<30;$i++){
            $title = ucfirst(implode($faker->words(2)));

            \App\Product::create(array(
                'title'=>$title,
                'description'=>$faker->sentence(30),
                'prix'=>$faker->numberBetween(5,600),
                'TVA'=>0.2,
                'reference'=>$faker->randomNumber(5),
                'stock'=>$faker->numberBetween(0,10),
            ));
        }
    }
}
