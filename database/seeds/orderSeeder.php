<?php

use App\Order;
use App\OrderProduct;
use Illuminate\Database\Seeder;

class orderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        Order::truncate(); // ça remet à zero la table
        OrderProduct::truncate(); // ça remet à zero la table

        for($i=0;$i<10;$i++){
            //une lettre + 5 chiffre au hasard
            $reference = $faker->randomLetter.$faker->randomNumber(5);
            //entre les 30 dernier jours et hier
            $date = $faker->dateTimeBetween('-30 days','-1 days');
            //entre hier et maintenant
            $dateup = $faker->dateTimeBetween('-1 days','now');

            Order::create(array(
                'reference'=> $reference,
                'created_at'=>$date,
                'updated_at'=>$dateup,
            ));

            $numberProducts = $faker->numberBetween(1,3);
            for($y=0;$y<$numberProducts;$y++){
                //entre un et 10
                $quantity = $faker->numberBetween(1,10);
                $productId = $faker->numberBetween(1,30);
                OrderProduct::create(array(
                    'order_id'=>($i+1),
                    'product_id'=>$productId,
                    'quantity'=>$quantity,
                    'created_at'=>$date,
                    'updated_at'=>$dateup,
                ));
            }
        }



    }
}
