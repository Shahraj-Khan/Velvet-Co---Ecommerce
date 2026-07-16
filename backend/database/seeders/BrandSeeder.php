<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Rolex',
            'Omega',
            'Casio',
            'Seiko',
            'Citizen',
            'Tissot',
            'Fossil',
            'Titan',
            'Daniel Wellington',
            'Apple',
            'Samsung',
            'Garmin'
        ];

        foreach ($brands as $brand) {
            Brand::firstOrCreate(
                ['slug' => Str::slug($brand)],
                [
                    'name' => $brand,
                    'slug' => Str::slug($brand),
                ]
            );
        }
    }
}