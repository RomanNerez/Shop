<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Products::class, function (Faker $faker) {

	$json = json_encode(['product-1.png', 'product-1.png', 'product-1.png', 'product-1.png']);
	$title = $faker->sentence(3);
    $slug = Str::slug($title, '-');

    return [
        'sub_categories_id' => rand(1,48),
        'title' => $title,
        'slug' => $slug,
        'description' => $faker->text,
        'photos' => $json,
        'price' => rand(100, 1000).'.'.rand(0, 99),
        'sale' => rand(10, 50),
        'brand' => $faker->company,
        'manufacturer' => $faker->lastName,
        'material' => $faker->word,
        'popular' => rand(0,1)
    ];
});
