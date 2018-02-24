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
                'id' => 5,
                'title' => 'general.accessories',
                'is_shown' => 1,
                'folder' => 'categories/SfxGBQQJX9f5YTDcSRGF',
                'slug' => 'accessories',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/SfxGBQQJX9f5YTDcSRGF/6hwRsm8akSu0X3YPOSHELxvzlLXw3FPTrZACFRYl.jpg',
                '_lft' => 3,
                '_rgt' => 20,
                'parent_id' => NULL,
                'created_at' => '2018-01-07 11:39:24',
                'updated_at' => '2018-02-24 12:59:32',
            ),
            1 => 
            array (
                'id' => 6,
                'title' => 'general.accessories.earring',
                'is_shown' => 1,
                'folder' => 'categories/X1cjVSiSXz0MUpp6JhO4',
                'slug' => 'women.accessories.earring',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/X1cjVSiSXz0MUpp6JhO4/MkmmcDcj7hzNnxYJ1ZpIEQapL9cqlszyp455ewhl.jpg',
                '_lft' => 4,
                '_rgt' => 5,
                'parent_id' => 5,
                'created_at' => '2018-01-07 12:07:04',
                'updated_at' => '2018-01-07 12:07:04',
            ),
            2 => 
            array (
                'id' => 7,
                'title' => 'general.accessories.necklaces',
                'is_shown' => 1,
                'folder' => 'categories/ubRtEEs0BVA12zAX3JZq',
                'slug' => 'women.accessories.necklaces',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/ubRtEEs0BVA12zAX3JZq/6VaC8ppGw91nidczaqndhiT9ORUKtD05HvE6qFW3.jpg',
                '_lft' => 6,
                '_rgt' => 7,
                'parent_id' => 5,
                'created_at' => '2018-01-07 12:11:16',
                'updated_at' => '2018-01-07 12:11:16',
            ),
            3 => 
            array (
                'id' => 8,
                'title' => 'general.accessories.bracelets',
                'is_shown' => 1,
                'folder' => 'categories/9T7PU0SmIpFA175JRkM3',
                'slug' => 'women.accessories.bracelets',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/9T7PU0SmIpFA175JRkM3/w656NDmlHjdvPKyoIC08VN5ih3KJHNH3gLvkTxku.jpg',
                '_lft' => 8,
                '_rgt' => 9,
                'parent_id' => 5,
                'created_at' => '2018-01-13 16:10:49',
                'updated_at' => '2018-01-13 16:18:30',
            ),
            4 => 
            array (
                'id' => 9,
                'title' => 'general.accessories.rings',
                'is_shown' => 1,
                'folder' => 'categories/t0WDNhTPI4jUGnN5Ei7W',
                'slug' => 'women.accessories.rings',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/t0WDNhTPI4jUGnN5Ei7W/abJ1vkmcmjx2mgKswdPuXewdKuD2USrThiQysRiH.jpg',
                '_lft' => 10,
                '_rgt' => 11,
                'parent_id' => 5,
                'created_at' => '2018-01-13 16:17:21',
                'updated_at' => '2018-01-13 16:18:15',
            ),
            5 => 
            array (
                'id' => 10,
                'title' => 'general.shoes',
                'is_shown' => 1,
                'folder' => 'categories/pQWlIKzuXCIIHyIqNmMu',
                'slug' => 'shoes',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/pQWlIKzuXCIIHyIqNmMu/KiIoK80yF7vqYCsc9lLShWqJaceQKLsxvuprZ6We.jpg',
                '_lft' => 21,
                '_rgt' => 22,
                'parent_id' => NULL,
                'created_at' => '2018-01-13 17:29:31',
                'updated_at' => '2018-02-24 13:00:09',
            ),
            6 => 
            array (
                'id' => 11,
                'title' => 'general.dresses',
                'is_shown' => 1,
                'folder' => 'categories/pFQrNjKXPAwK7BF37Vvz',
                'slug' => 'dresses',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/pFQrNjKXPAwK7BF37Vvz/QUsjYuj2BWfpm5pvYhrUyzySEAIkmvBrRRe6Sjdl.jpg',
                '_lft' => 23,
                '_rgt' => 24,
                'parent_id' => NULL,
                'created_at' => '2018-02-22 16:52:53',
                'updated_at' => '2018-02-24 13:00:15',
            ),
            7 => 
            array (
                'id' => 12,
                'title' => 'general.hoodies',
                'is_shown' => 1,
                'folder' => 'categories/QHKvMoe0851ZFDlnOxhk',
                'slug' => 'hoodies',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/QHKvMoe0851ZFDlnOxhk/z8dgmVWCiO2yF7hUquqsS1zKxHHxEXxXtq7mEbHw.jpg',
                '_lft' => 25,
                '_rgt' => 26,
                'parent_id' => NULL,
                'created_at' => '2018-02-22 17:48:18',
                'updated_at' => '2018-02-24 13:00:20',
            ),
            8 => 
            array (
                'id' => 13,
                'title' => 'general.shirts',
                'is_shown' => 1,
                'folder' => 'categories/jEYODuBD4wRy2w7xmL3S',
                'slug' => 'shirts',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/jEYODuBD4wRy2w7xmL3S/AhHc3CQCp1zlnEiD692fBH5e5wrGAkufkVrllTXS.jpg',
                '_lft' => 27,
                '_rgt' => 28,
                'parent_id' => NULL,
                'created_at' => '2018-02-24 05:54:07',
                'updated_at' => '2018-02-24 13:00:24',
            ),
            9 => 
            array (
                'id' => 14,
                'title' => 'general.sweaters',
                'is_shown' => 1,
                'folder' => 'categories/ioFUOvGNeFYLZJKKH0hM',
                'slug' => 'sweaters',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/ioFUOvGNeFYLZJKKH0hM/TeRfCnbe8LUFF0V9YcUQGyYzZdzwVt7iZAgpYgNm.jpg',
                '_lft' => 29,
                '_rgt' => 30,
                'parent_id' => NULL,
                'created_at' => '2018-02-24 08:22:46',
                'updated_at' => '2018-02-24 13:00:28',
            ),
            10 => 
            array (
                'id' => 15,
                'title' => 'general.glasses',
                'is_shown' => 1,
                'folder' => 'categories/YhATBWJBtKWpWALFx40l',
                'slug' => 'women.accessories.glasses',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/YhATBWJBtKWpWALFx40l/duiXPBAStjGp8HAV2pM4ngLUPl51YsH9i8ZzrUZ5.jpg',
                '_lft' => 14,
                '_rgt' => 15,
                'parent_id' => 5,
                'created_at' => '2018-02-24 10:11:08',
                'updated_at' => '2018-02-24 10:14:56',
            ),
            11 => 
            array (
                'id' => 16,
                'title' => 'general.scarfs',
                'is_shown' => 1,
                'folder' => 'categories/iHIdPRWjXnyY90XCwxNc',
                'slug' => 'women.accessories.scarfs',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/iHIdPRWjXnyY90XCwxNc/nxKG2c0xzrtU8k3kOPkg9dPx2XJp5RAHdFbKSL3W.jpg',
                '_lft' => 12,
                '_rgt' => 13,
                'parent_id' => 5,
                'created_at' => '2018-02-24 10:14:19',
                'updated_at' => '2018-02-24 10:14:19',
            ),
            12 => 
            array (
                'id' => 17,
                'title' => 'general.accessories.hats',
                'is_shown' => 1,
                'folder' => 'categories/L7p4tMCoH49NhyksIaP5',
                'slug' => 'women.accessories.hats',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/L7p4tMCoH49NhyksIaP5/h9d9Fnqcy9PnQNXRmwez379moohVtWGnRDizztOA.jpg',
                '_lft' => 16,
                '_rgt' => 17,
                'parent_id' => 5,
                'created_at' => '2018-02-24 10:22:37',
                'updated_at' => '2018-02-24 10:22:37',
            ),
            13 => 
            array (
                'id' => 18,
                'title' => 'general.accessories.hair',
                'is_shown' => 1,
                'folder' => 'categories/rvTASZbsfJRiGkV9o3qw',
                'slug' => 'women.accessories.hair',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/rvTASZbsfJRiGkV9o3qw/xlUDQmXOFH83C8XHp7Y8MFZwcdcu13UqPtWXul7T.jpg',
                '_lft' => 18,
                '_rgt' => 19,
                'parent_id' => 5,
                'created_at' => '2018-02-24 10:34:23',
                'updated_at' => '2018-02-24 10:34:23',
            ),
            14 => 
            array (
                'id' => 19,
                'title' => 'general.suits',
                'is_shown' => 1,
                'folder' => 'categories/fsBXeSgQBjNWpGMNDlVZ',
                'slug' => 'suits',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/fsBXeSgQBjNWpGMNDlVZ/ayLkhx5WjBIsg5Y9HjVCoGKBBOT42hStTTgYhpzf.jpg',
                '_lft' => 1,
                '_rgt' => 2,
                'parent_id' => NULL,
                'created_at' => '2018-02-24 12:58:55',
                'updated_at' => '2018-02-24 12:58:55',
            ),
            15 => 
            array (
                'id' => 20,
                'title' => 'electronics.mobile.cases',
                'is_shown' => 1,
                'folder' => 'categories/rwLRyVhcA0TC3oX1u6fc',
                'slug' => 'cases',
                'description' => NULL,
                'user_id' => 1,
                'image_url' => 'categories/rwLRyVhcA0TC3oX1u6fc/onCzyVq3lMt0k5NYKDTY7qXXMyw3U2iH8zOdA3KT.jpg',
                '_lft' => 31,
                '_rgt' => 32,
                'parent_id' => NULL,
                'created_at' => '2018-02-24 14:15:50',
                'updated_at' => '2018-02-24 14:15:50',
            ),
        ));
        
        
    }
}