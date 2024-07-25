<?php

namespace Database\Seeders;


use App\Models\tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $categories =['php','laravel php', 'back end development','fromt end development'];
    
    
    foreach($categories as $category){
        tags::create([
            'name'=> $category
        ]);
    }
        }
    }
}
