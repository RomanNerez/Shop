<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SubCategories;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(SubCategories::class, function (Faker $faker) {
	
	$arr = ['Apple', 'ASUS', 'Fly', 'Huawei', 'Lenovo', 'SONY', 'MOTOROLA', 'Dopod', 'EVO', 'Emol'];
	$title = $arr[rand(0,9)];
	$slug = Str::slug($title, '-');
	
    return [
        'title' => $title,
        'slug' => $slug,
        'categories_id' => rand(1,6)
    ];
});
