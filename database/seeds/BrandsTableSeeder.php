<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 9; $i++) {
            $newBrand = new Brand();
            $newBrand->name = $faker->unique()->randomElement(['Renault', 'Fiat', 'Ford', 'Maserati', 'Audi', 'Skoda', 'BMW', 'Mercedes', 'Lancia']);
            $newBrand->save();
        }
    }
}
