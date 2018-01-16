<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Dgdggd',
                'number' => '994518550105',
                'status' => NULL,
                'reviewable' => NULL,
                'user_id' => NULL,
                'created_at' => '2018-01-08 20:51:14',
                'updated_at' => '2018-01-08 20:51:14',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Elvin',
                'number' => '994518550105',
                'status' => NULL,
                'reviewable' => NULL,
                'user_id' => NULL,
                'created_at' => '2018-01-13 16:29:50',
                'updated_at' => '2018-01-13 16:29:50',
            ),
        ));
        
        
    }
}