<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(2,1,99), //(decimal,minimum int, maximum int)
        'transactionType' =>$faker->randomElement($array = array('buy','free','exchange')),
        'category' => $faker->randomElement($array = array('adidas','nike','karrimor','puma')),
        'detail' => $faker->text($maxNbChars = 200),
        'updated_at' => $faker->unixTime(),
        'created_at' => $faker->unixTime(),
    ];
});