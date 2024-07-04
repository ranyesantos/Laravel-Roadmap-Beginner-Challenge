<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [];
        for ($i = 1; $i <= 15; $i++){
            $categories[] = [
                'name' => "category $i"
            ];
        }
        DB::table('categories')->insert($categories);
        
    }
}
