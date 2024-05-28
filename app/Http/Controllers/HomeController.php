<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function byCategory(string $id){
        $articles = Article::where("category_id", $id)->get();
        $categoryController = new CategoryController();
        $categories = $categoryController->index();
        return view('blog.index', ['articles' => $articles, 'categories'=> $categories]);
    }

    public function byTag(string $id){

    }
}
