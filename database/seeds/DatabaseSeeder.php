<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CarouselsTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        Cache::flush();
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderProductTableSeeder::class);
    }
}
