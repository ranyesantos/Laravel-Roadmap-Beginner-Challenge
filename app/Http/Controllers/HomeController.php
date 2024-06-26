<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Article_tag;
use App\Models\Category;
use App\Models\Tag;

class HomeController extends Controller
{
    public function byCategory(string $id){
        $articles = Article::where("category_id", $id)->get();
        $category = Category::where('id', $id)->pluck('name')->first();
        $title = "Categoria: " . $category;
        return view('blog.filtered', ['articles' => $articles, 'title' => $title]);
    }

    public function byTag(string $id){

        $tagIds = explode(',', $id);

        foreach ($tagIds as $tagId) {
            $articles_ids = Article_tag::where("tag_id", $tagId)->pluck('article_id');
        }

        $articles = Article::whereIn('id', $articles_ids)->get();

        $tag = Tag::where("id", $id)->pluck('name')->first();
        $title = "#" . $tag;
        return view('blog.filtered', ['articles' => $articles, 'title' => $title]);

    }
}
