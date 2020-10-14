<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SubCategories;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(SubCategories::class, function (Faker $faker) {
	
    return [
    	'categories_id' => rand(1,6),
        'title' => ucfirst($faker->word()),
        'meta_title' => $faker->sentence(3),
        'slug' => Str::slug($faker->sentence(3), '-'),
        'desc' => $faker->sentence(105),
        'meta_desc' => $faker->sentence(105),
    ];
});
