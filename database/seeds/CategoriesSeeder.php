<?php

use App\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrCategories = [
        	'Чехлы',
        	'Захисники екранiв',
        	'Texнiчнi аксесуари',
        	'Музика',
        	'Носимi аксесуари',
        	'Iнше'
        ];

        foreach($arrCategories as $value){
        	Categories::create([
        		'title' => $value,
        		'slug'  => Str::slug($value, '-'),
        	]);
        }
    }
}
