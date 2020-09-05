<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
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

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->text(50),
        'author' => $faker->name,
        'price' => $faker->randomNumber(2),
        'description' => $faker->text(),
        'available' => $faker->boolean(75),
        'created_at' => $faker->date(),
    ];
});
