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
//        $this->call(UserSeeder::class);
//        $this->call(CategoriesTableSeeder::class);
//        $this->call(BrandsTableSeeder::class);
//        $this->call(AvailabilityTableSeeder::class);
//        $this->call(CountriesTableSeeder::class);
//        $this->call(UnitsTableSeeder::class);
//        $this->call(ProductPropertyKeysSeeder::class);
//        $this->call(ProductsSeeder::class);
//        $this->call(PagesTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
    }
}
