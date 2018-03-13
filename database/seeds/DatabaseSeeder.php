<?php

use Illuminate\Database\Seeder;
use App\User;
use App\category;
use App\product;
use App\transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       // $this->call(UsersTableSeeder::class);
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
         user::truncate();
         category::truncate();
         Product::truncate();
         Transaction::truncate();

         DB::table('category_product')->truncate();

         $usersQuantity = 1000;
         $categoriesQuantity = 20;
         $productsQuantity = 500;
         $transactionQuantity = 500;

         factory(user::class,$usersQuantity)->create();
         factory(category::class,$categoriesQuantity)->create();
         factory(product::class,$productsQuantity)->create()->each(
             function($product){
                $categories = category::all()->random(mt_rand(1,5))->pluck('id');
                $product->categories()->attach($categories);
            }
         );
         factory(transaction::class,$transactionQuantity)->create();

         




    }
}
