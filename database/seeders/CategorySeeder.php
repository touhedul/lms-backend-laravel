<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::create(['name' => 'Programming']);
        Category::create(['name' => 'Design']);
        Category::create(['name' => 'Marketing']);
        Category::create(['name' => 'Business']);
        Category::create(['name' => 'Photography']);
        Category::create(['name' => 'Music']);
    }
}
