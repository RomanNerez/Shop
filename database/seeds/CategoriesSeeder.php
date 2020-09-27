<?php

use App\Categories;
use App\LocalCategory;
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
                'file' => 'test.txt',
        		'slug'  => Str::slug($value, '-'),
        	]);
        }

        $arrLocalRuCategories = [
            [
                'category_id' => 1,
                'title' => 'Чехлы',
                'desc' => 'Test',
                'meta_title' => 'Чехлы',
                'meta_desc' => 'Test',
                'local' => 'ru'
            ],[
                'category_id' => 1,
                'title' => 'Чехлы',
                'desc' => 'Test',
                'meta_title' => 'Чехлы',
                'meta_desc' => 'Test',
                'local' => 'ua'
            ],[
                'category_id' => 2,
                'title' => 'Защитные экраны',
                'desc' => 'Test',
                'meta_title' => 'Защитные экраны',
                'meta_desc' => 'Test',
                'local' => 'ru'
            ],[
                'category_id' => 2,
                'title' => 'Захисники екранiв',
                'desc' => 'Test',
                'meta_title' => 'Захисники екранiв',
                'meta_desc' => 'Test',
                'local' => 'ua'
            ],[
                'category_id' => 3,
                'title' => 'Техничные акссесуары',
                'desc' => 'Test',
                'meta_title' => 'Техничные акссесуары',
                'meta_desc' => 'Test',
                'local' => 'ru'
            ],[
                'category_id' => 3,
                'title' => 'Texнiчнi аксесуари',
                'desc' => 'Test',
                'meta_title' => 'Texнiчнi аксесуари',
                'meta_desc' => 'Test',
                'local' => 'ua'
            ],[
                'category_id' => 4,
                'title' => 'Музыка',
                'desc' => 'Test',
                'meta_title' => 'Музыка',
                'meta_desc' => 'Test',
                'local' => 'ru'
            ],[
                'category_id' => 4,
                'title' => 'Музыка',
                'desc' => 'Test',
                'meta_title' => 'Музыка',
                'meta_desc' => 'Test',
                'local' => 'ua'
            ],[
                'category_id' => 5,
                'title' => 'Носимые акссесуры',
                'desc' => 'Test',
                'meta_title' => 'Носимые акссесуры',
                'meta_desc' => 'Test',
                'local' => 'ru'
            ],[
                'category_id' => 5,
                'title' => 'Носимi аксесуари',
                'desc' => 'Test',
                'meta_title' => 'Носимi аксесуари',
                'meta_desc' => 'Test',
                'local' => 'ua'
            ],[
                'category_id' => 6,
                'title' => 'Другое',
                'desc' => 'Test',
                'meta_title' => 'Другое',
                'meta_desc' => 'Test',
                'local' => 'ru'
            ],[
                'category_id' => 6,
                'title' => 'Iнше',
                'desc' => 'Test',
                'meta_title' => 'Iнше',
                'meta_desc' => 'Test',
                'local' => 'ua'
            ],
        ];

        foreach($arrLocalRuCategories as $value){
            LocalCategory::create($value);
        }
    }
}
