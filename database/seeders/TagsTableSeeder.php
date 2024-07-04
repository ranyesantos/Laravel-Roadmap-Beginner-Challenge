<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [];
        for ($i = 1; $i <= 25; $i++){
            $tags [] = [
                'name' => "tag $i"
            ];
        }
        DB::table('tags')->insert($tags);
    }
}
