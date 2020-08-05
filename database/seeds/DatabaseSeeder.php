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
        // $this->call(UserSeeder::class);
        
        //factory(App\Categories::class, 6)->create();
        //factory(App\SubCategories::class, 48)->create();
        $this->call(CategoriesSeeder::class);
        $this->call(SubCategoriesSeeder::class);
        
        factory(App\Products::class, 480)->create();
    }

}
