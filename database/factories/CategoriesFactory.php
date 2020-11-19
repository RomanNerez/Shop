<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categories;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Categories::class, function (Faker $faker) {

	$title = $faker->sentence(3);
	$slug = Str::slug($title, '-');
	
    return [
        'title' => $title,
        'desc' => $faker->sentence(105),
        'meta_title' => $title,
        'meta_desc' => $faker->sentence(105),
        'slug' => $slug,
    ];
});
