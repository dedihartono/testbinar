<?php

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    static $number = 1;
    return [
        'id' => $number++,
        'price' => $faker->randomFloat(2, null, 8),
        'imageurl' => $faker->imageUrl(),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
