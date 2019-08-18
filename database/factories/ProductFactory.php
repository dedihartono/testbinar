<?php

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    static $number = 1;
    return [
        'id' => $number++,
        'name' => $faker->name,
        'price' => $faker->randomFloat(2, 1000.00, 1000000.00),
        'imageurl' => $faker->imageUrl(),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
