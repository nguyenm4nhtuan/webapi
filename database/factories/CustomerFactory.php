<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'email' => $faker->unique()->email,
        'tel' => $faker->phoneNumber,
        'age' => rand(20, 90),
    ];
});

