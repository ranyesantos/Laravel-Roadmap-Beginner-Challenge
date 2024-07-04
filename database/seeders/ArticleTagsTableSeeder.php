<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articleTags = [];

        for ($i = 1; $i <= 30; $i++){;

            $articleTags[] = [
                'article_id' => $i,
                'tag_id' => rand(1, 25),
            ];

        }
        DB::table('article_tags')->insert($articleTags);
    }
}
