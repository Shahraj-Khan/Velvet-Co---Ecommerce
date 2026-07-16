<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
    2, // Rolex
    3, // Omega
    4, // Casio
    5, // Seiko
    6, // Citizen
    7, // Tissot
    8, // Fossil
    9, // Titan
    10,// Daniel Wellington
    11,// Apple
    12,// Samsung
    13 // Garmin
];
$categories = [
    2, // Luxury Watches
    3, // Smart Watches
    4, // Sports Watches
    5, // Classic Watches
    6, // Digital Watches
    7, // Automatic Watches
    8, // Chronograph Watches
    9  // Fashion Watches
];
$products = [
    "Rolex Submariner",
    "Rolex Daytona",
    "Omega Speedmaster",
    "Omega Seamaster",
    "Casio G-Shock",
    "Casio Edifice",
    "Seiko Presage",
    "Seiko 5 Sports",
    "Citizen Eco Drive",
    "Citizen Promaster",
    "Tissot PRX",
    "Tissot Gentleman",
    "Fossil Grant",
    "Fossil Machine",
    "Titan Neo",
    "Titan Edge",
    "Daniel Wellington Classic",
    "Daniel Wellington Iconic",
    "Apple Watch Series 10",
    "Apple Watch Ultra",
    "Samsung Galaxy Watch 7",
    "Samsung Galaxy Watch Ultra",
    "Garmin Fenix 8",
    "Garmin Forerunner 965",
    "Leather Wallet",
    "Men Shirt",
    "Women Shirt",
    "Slim Fit Jeans",
    "Cargo Pant",
    "Running Shoes",
    "Formal Shoes",
    "Sneakers",
    "Leather Belt",
    "Backpack",
    "Laptop Bag",
    "Bluetooth Speaker",
    "Wireless Earbuds",
    "Gaming Mouse",
    "Mechanical Keyboard",
    "Toy Car",
    "Building Blocks",
    "Teddy Bear",
    "Football",
    "Basketball",
    "Cricket Bat",
    "Sunglasses",
    "Perfume",
    "Power Bank",
    "Phone Case",
    "Smartphone Stand"
];
foreach (range(1, 100) as $i) {

    $name = $products[array_rand($products)] . " " . $i;

    Product::create([
        'brand_id' => $brands[array_rand($brands)],
        'category_id' => $categories[array_rand($categories)],
        'name' => $name,
        'slug' => Str::slug($name),

        'description' =>
            "Premium quality {$name}. Built with excellent craftsmanship and durability.",

        'price' => rand(50, 3000),

        'quantity' => rand(5, 100),

        'thumbnail' =>
            "https://picsum.photos/seed/product{$i}/600/600",

        'first_image' =>
            "https://picsum.photos/seed/product{$i}a/600/600",

        'second_image' =>
            "https://picsum.photos/seed/product{$i}b/600/600",

        'third_image' =>
            "https://picsum.photos/seed/product{$i}c/600/600",

        'status' => 1,
    ]);
}
    }
}