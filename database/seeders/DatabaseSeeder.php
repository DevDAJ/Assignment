<?php

namespace Database\Seeders;

use App\Models\Car;
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
        // User::factory(10)->create();

        $cars = [
            [
                'make' => 'PROTON',
                'year' => 2022,
                'model' => 'X50',
                'variant' => 'EXECUTIVE',
                'price' => 80,
            ],
            [
                'make' => 'PROTON',
                'year' => 2022,
                'model' => 'X50',
                'variant' => 'PREMIUM',
                'price' => 100,
            ],
            [
                'make' => 'PROTON',
                'year' => 2023,
                'model' => 'X50',
                'variant' => 'EXECUTIVE',
                'price' => 90,
            ],
            [
                'make' => 'PROTON',
                'year' => 2023,
                'model' => 'X50',
                'variant' => 'PREMIUM',
                'price' => 110,
            ],
            [
                'make' => 'PROTON',
                'year' => 2021,
                'model' => 'X70',
                'variant' => 'TGDI EXECUTIVE',
                'price' => 95,
            ],
            [
                'make' => 'PROTON',
                'year' => 2021,
                'model' => 'X70',
                'variant' => 'TGDI PREMIUM',
                'price' => 105,
            ],
            [
                'make' => 'PROTON',
                'year' => 2022,
                'model' => 'X70',
                'variant' => 'TGDI EXECUTIVE',
                'price' => 100,
            ],
            [
                'make' => 'PROTON',
                'year' => 2022,
                'model' => 'X70',
                'variant' => 'TGDI PREMIUM',
                'price' => 120,
            ],
            [
                'make' => 'PROTON',
                'year' => 2022,
                'model' => 'X70',
                'variant' => 'TGDI STANDARD',
                'price' => 110,
            ],
            [
                'make' => 'PERODUA',
                'year' => 2021,
                'model' => 'MYVI',
                'variant' => 'AV',
                'price' => 40
            ],
            [
                'make' => 'PERODUA',
                'year' => 2021,
                'model' => 'MYVI',
                'variant' => 'EXTREME',
                'price' => 45
            ],
            [
                'make' => 'PERODUA',
                'year' => 2022,
                'model' => 'MYVI',
                'variant' => 'AV',
                'price' => 45
            ],
            [
                'make' => 'PERODUA',
                'year' => 2022,
                'model' => 'MYVI',
                'variant' => 'EXTREME',
                'price' => 50
            ],
            [
                'make' => 'PERODUA',
                'year' => 2022,
                'model' => 'AXIA',
                'variant' => 'E',
                'price' => 30
            ],
            [
                'make' => 'PERODUA',
                'year' => 2023,
                'model' => 'MYVI',
                'variant' => 'EXTREME',
                'price' => 55
            ],
            [
                'make' => 'PERODUA',
                'year' => 2023,
                'model' => 'AXIA',
                'variant' => 'E',
                'price' => 40
            ],
            [
                'make' => 'PERODUA',
                'year' => 2023,
                'model' => 'ALZA',
                'variant' => 'AV',
                'price' => 70
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        };
    }
}
