<?php

use Illuminate\Database\Seeder;

class OrderProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('order_product')->delete();
        
        \DB::table('order_product')->insert(array (
            0 => 
            array (
                'id' => '1',
                'order_id' => '1',
                'product_id' => '1',
                'options' => '{}',
                'reviewable' => NULL,
                'price' => '10',
                'amount' => '1',
            ),
            1 => 
            array (
                'id' => '2',
                'order_id' => '2',
                'product_id' => '1',
                'options' => '{}',
                'reviewable' => NULL,
                'price' => '10',
                'amount' => '6',
            ),
            2 => 
            array (
                'id' => '3',
                'order_id' => '2',
                'product_id' => '6',
                'options' => '{}',
                'reviewable' => NULL,
                'price' => '19',
                'amount' => '1',
            ),
            3 => 
            array (
                'id' => '4',
                'order_id' => '2',
                'product_id' => '8',
                'options' => '{}',
                'reviewable' => NULL,
                'price' => '10',
                'amount' => '1',
            ),
        ));
        
        
    }
}