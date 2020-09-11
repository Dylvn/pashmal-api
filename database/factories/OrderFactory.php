<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

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

$factory->define(Order::class, function (Faker $faker) {
    $htPrice = $faker->randomNumber(2);
    $ttcPrice = $htPrice * 19.6;

    $users = App\User::all();

    return [
        'billing_address' => $faker->streetAddress,
        'billing_postalcode' => $faker->randomNumber(5),
        'billing_city' => $faker->city,
        'delivery_address' => $faker->streetAddress,
        'delivery_postalcode' => $faker->randomNumber(5),
        'delivery_city' => $faker->city,
        'ttc_price' => $ttcPrice,
        'ht_price' => $htPrice,
        'user_id' => $users->random(1)->first(),
    ];
});
