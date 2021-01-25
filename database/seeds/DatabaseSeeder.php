<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Categories::class, 6)->create();
        //factory(App\SubCategories::class, 48)->create();
        // $this->call(SubCategoriesSeeder::class);

        DB::table('lang')->insert([
            [
                'title'  => 'Русский',
                'local'  => 'ru',
                'abbrev' => 'рус'
            ],[
                'title'  => 'УкраЇнська',
                'local'  => 'ua',
                'abbrev' => 'укр'
            ]
        ]);
        
        //factory(App\Products::class, 480)->create();
        factory(App\User::class, 1)->create();
    }

}
