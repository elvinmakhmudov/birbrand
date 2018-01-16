<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'men',
                'is_shown' => '1',
                'folder' => 'categories/YcXCHA5dYPK2MZUgZZLr',
                'slug' => 'men',
                'description' => NULL,
                'user_id' => '1',
                'image_url' => NULL,
                '_lft' => '1',
                '_rgt' => '2',
                'parent_id' => NULL,
                'created_at' => '2018-01-06 16:26:45',
                'updated_at' => '2018-01-06 16:26:45',
            ),
            1 => 
            array (
                'id' => '2',
                'title' => 'women',
                'is_shown' => '1',
                'folder' => 'categories/dB6wRDyqZkqKt87S24r0',
                'slug' => 'women',
                'description' => NULL,
                'user_id' => '1',
                'image_url' => NULL,
                '_lft' => '3',
                '_rgt' => '16',
                'parent_id' => NULL,
                'created_at' => '2018-01-06 16:27:11',
                'updated_at' => '2018-01-06 16:27:11',
            ),
            2 => 
            array (
                'id' => '3',
                'title' => 'electronics',
                'is_shown' => '1',
                'folder' => 'categories/rmntSW5WZOp0rvq0iPEH',
                'slug' => 'electronics',
                'description' => NULL,
                'user_id' => '1',
                'image_url' => NULL,
                '_lft' => '17',
                '_rgt' => '18',
                'parent_id' => NULL,
                'created_at' => '2018-01-06 16:28:14',
                'updated_at' => '2018-01-13 11:20:32',
            ),
            3 => 
            array (
                'id' => '5',
                'title' => 'general.accessories',
                'is_shown' => '1',
                'folder' => 'categories/SfxGBQQJX9f5YTDcSRGF',
                'slug' => 'women.accessories',
                'description' => NULL,
                'user_id' => '1',
                'image_url' => 'categories/SfxGBQQJX9f5YTDcSRGF/6hwRsm8akSu0X3YPOSHELxvzlLXw3FPTrZACFRYl.jpg',
                '_lft' => '4',
                '_rgt' => '13',
                'parent_id' => '2',
                'created_at' => '2018-01-07 11:39:24',
                'updated_at' => '2018-01-07 11:39:24',
            ),
            4 => 
            array (
                'id' => '6',
                'title' => 'general.accessories.earring',
                'is_shown' => '1',
                'folder' => 'categories/X1cjVSiSXz0MUpp6JhO4',
                'slug' => 'women.accessories.earring',
                'description' => NULL,
                'user_id' => '1',
                'image_url' => 'categories/X1cjVSiSXz0MUpp6JhO4/MkmmcDcj7hzNnxYJ1ZpIEQapL9cqlszyp455ewhl.jpg',
                '_lft' => '5',
                '_rgt' => '6',
                'parent_id' => '5',
                'created_at' => '2018-01-07 12:07:04',
                'updated_at' => '2018-01-07 12:07:04',
            ),
            5 => 
            array (
                'id' => '7',
                'title' => 'general.accessories.necklaces',
                'is_shown' => '1',
                'folder' => 'categories/ubRtEEs0BVA12zAX3JZq',
                'slug' => 'women.accessories.necklaces',
                'description' => NULL,
                'user_id' => '1',
                'image_url' => 'categories/ubRtEEs0BVA12zAX3JZq/6VaC8ppGw91nidczaqndhiT9ORUKtD05HvE6qFW3.jpg',
                '_lft' => '7',
                '_rgt' => '8',
                'parent_id' => '5',
                'created_at' => '2018-01-07 12:11:16',
                'updated_at' => '2018-01-07 12:11:16',
            ),
            6 => 
            array (
                'id' => '8',
                'title' => 'general.accessories.bracelets',
                'is_shown' => '1',
                'folder' => 'categories/9T7PU0SmIpFA175JRkM3',
                'slug' => 'women.accessories.bracelets',
                'description' => NULL,
                'user_id' => '1',
                'image_url' => 'categories/9T7PU0SmIpFA175JRkM3/w656NDmlHjdvPKyoIC08VN5ih3KJHNH3gLvkTxku.jpg',
                '_lft' => '9',
                '_rgt' => '10',
                'parent_id' => '5',
                'created_at' => '2018-01-13 16:10:49',
                'updated_at' => '2018-01-13 16:18:30',
            ),
            7 => 
            array (
                'id' => '9',
                'title' => 'general.accessories.rings',
                'is_shown' => '1',
                'folder' => 'categories/t0WDNhTPI4jUGnN5Ei7W',
                'slug' => 'women.accessories.rings',
                'description' => NULL,
                'user_id' => '1',
                'image_url' => 'categories/t0WDNhTPI4jUGnN5Ei7W/abJ1vkmcmjx2mgKswdPuXewdKuD2USrThiQysRiH.jpg',
                '_lft' => '11',
                '_rgt' => '12',
                'parent_id' => '5',
                'created_at' => '2018-01-13 16:17:21',
                'updated_at' => '2018-01-13 16:18:15',
            ),
            8 => 
            array (
                'id' => '10',
                'title' => 'general.shoes',
                'is_shown' => '1',
                'folder' => 'categories/pQWlIKzuXCIIHyIqNmMu',
                'slug' => 'women.shoes',
                'description' => NULL,
                'user_id' => '1',
                'image_url' => 'categories/pQWlIKzuXCIIHyIqNmMu/KiIoK80yF7vqYCsc9lLShWqJaceQKLsxvuprZ6We.jpg',
                '_lft' => '14',
                '_rgt' => '15',
                'parent_id' => '2',
                'created_at' => '2018-01-13 17:29:31',
                'updated_at' => '2018-01-13 17:29:31',
            ),
        ));
        
        
    }
}