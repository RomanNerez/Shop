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
        factory(App\Categories::class, 6)->create();
        $this->call(SubCategoriesSeeder::class);

        DB::table('langs')->insert([
            [
                'title' => 'Русский',
                'local' => 'ru'
            ],
            [
                'title' => 'Украинский',
                'local' => 'ua'
            ]
        ]);
        
        factory(App\Products::class, 480)->create();
        factory(App\User::class, 1)->create();
    }

}
