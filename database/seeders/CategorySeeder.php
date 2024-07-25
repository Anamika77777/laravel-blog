<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =['Science','Sports', 'Entertainment'];


foreach($categories as $category){
    category::create([
        'name'=> $category
    ]);
}
    }
}
