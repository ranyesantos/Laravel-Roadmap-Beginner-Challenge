<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [];
        for ($i = 1; $i <= 70; $i++){
            $articles[] = [
                'title' => "this is the title of article number $i",
                'text' => "this is the text of article number $i",
                'category_id' => rand(1, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('articles')->insert($articles);
    }
}
