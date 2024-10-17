<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Parent ক্যাটাগরি
        $electronics = Category::create(['name' => 'Electronics']);
        
        // Child ক্যাটাগরি
        $mobiles = Category::create(['name' => 'Mobiles', 'parent_id' => $electronics->id]);
        
        // Sub-child ক্যাটাগরি
        Category::create(['name' => 'Smartphones', 'parent_id' => $mobiles->id]);
        Category::create(['name' => 'Feature Phones', 'parent_id' => $mobiles->id]);
    }
}
