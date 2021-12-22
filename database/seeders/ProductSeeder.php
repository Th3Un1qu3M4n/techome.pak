<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=>'Gionee Earphones',
                'category'=>'earphone',
                'price'=>300,
                'description'=>'Latest and genuine gionee earphones for high quality audio experience.',
                'gallery'=>'https://www.chargero.pk/wp-content/uploads/2020/12/100-Original-Gionee.png'
            ],
            [
                'name'=>'Iphone Charger',
                'category'=>'charger',
                'price'=>1200,
                'description'=>'High quality Iphone charger that safely charges your iphone and with longer battery life.',
                'gallery'=>'https://static-01.daraz.pk/p/272a702482db6ebf574b95a194293ef1.jpg'
            ],
            [
                'name'=>'SanDisk Memory Card 64GB',
                'category'=>'storage',
                'price'=>800,
                'description'=>'SanDisk 64GB Class 10 memory best for CCTV and Mobiles.',
                'gallery'=>'https://myshop.pk/pub/media/catalog/product/cache/26f8091d81cea4b38d820a1d1a4f62be/s/a/sandisk_ultra_micro_sd_card_64gb_myshop_pk_01.jpg'
            ],
        ]);
    }
}
