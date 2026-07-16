<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Luxury Watches',
            'Smart Watches',
            'Sports Watches',
            'Classic Watches',
            'Digital Watches',
            'Automatic Watches',
            'Chronograph Watches',
            'Fashion Watches'
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => Str::slug($category)],
                [
                    'name' => $category,
                    'slug' => Str::slug($category),
                ]
            );
        }
    }
}