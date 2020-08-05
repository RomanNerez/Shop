<?php

use Illuminate\Database\Seeder;
use App\SubCategories;
use App\Categories;
use Illuminate\Support\Str;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Apple', 'ASUS', 'Fly', 'Huawei', 'Lenovo', 'SONY', 'MOTOROLA', 'Dopod', 'EVO', 'Emol', 'RomaPhone'];
        $c = 1;
        $t = 0;
		
		for($i = 0; $i < (Categories::count() * 8); $i++){
			if($c === Categories::count() + 1) $c = 1;
			if($t === count($arr)) $t = 0;  
			SubCategories::create([
				'title' => $arr[$t],
	        	'slug'  => Str::slug($arr[$t], '-'),
	        	'categories_id' => $c
			]);
			$c++;
			$t++;
		}
    }
}
