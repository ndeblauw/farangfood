<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Review;
use App\Models\Shop;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(15)->create();
        Food::factory(5)->create();

        $shops = Shop::factory(10)->create();
        Review::factory(30)->create();

        foreach($shops as $shop) {
            $shop->foods()->attach(Food::inRandomOrder()->take(rand(1, 3))->pluck('id'));
        }

    }
}
