<?php

use Faker\Generator as Faker;
use App\user;
use App\category;
use App\product;
use App\transaction;
use App\seller;
use App\buyer;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'verified' => $verified =  $faker->randomElement([User::VERIFIED_USER, user::UNVERIFIED_USER]),
        'verification_token' => $verified == user::VERIFIED_USER ? null : User::genrateVerificationCode(),
        'admin' => $verified = $faker->randomElement([user::ADMIN_USER, user::REGULAR_USER]),
        
    ];
});

$factory->define(\App\category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1)
        
    ];
});

$factory->define(\App\product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' =>    $faker->paragraph(1),
        'quantity'    =>    $faker->numberBetween(1,15),
        'status'      =>    $faker->randomElement([Product::AVAILABLE_PRODUCT,Product::UNAVAILABLE_PRODUCT]),
        'image'       =>    $faker->randomElement(['1.jpeg','2.jpeg','3.jpeg']),
        'seller_id'   =>    user::all()->random()->id
        
    ];
});

$factory->define(\App\transaction::class, function (Faker $faker) {
    $seller = seller::has('products')->get()->random();
    $buyer = user::all()->except($seller->id)->random();
    return [
        'quantity'    =>    $faker->numberBetween(1,5),
        'buyer_id'   => $buyer->id,
        'product_id'   => $seller->products->random()->id
        
    ];
});
