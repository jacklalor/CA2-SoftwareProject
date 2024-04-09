<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Category::create(['name' => 'Tents']);
        Category::create(['name' => 'Sleeping']);
        Category::create(['name' => 'Lighting']);
        Category::create(['name' => 'Cooking']);
        Category::create(['name' => 'Accessories']);



        // Add more categories as needed
    }
}
