<?php

use Illuminate\Database\Seeder;
use App\Car;
use App\Color;
use Faker\Generator as Faker;

class CarColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $color_ids = Color::pluck('id')->toArray();
        $cars = Car::all();
        foreach ($cars as $car) {
            $car->colors()->sync($faker->randomElements($color_ids, rand(1, 4)));
        }
    }
}
