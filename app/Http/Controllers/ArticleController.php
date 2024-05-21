<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Article_tag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.create', ['categories' => $categories, 'tags'=> $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $title = $request->input('title');
        $text = $request->input('text');
        $category = $request->input('category_id');
        $tags = $request->input('tags', []);

        if (!empty($title) && !empty($text) && !empty($category)){
            $Article = Article::create($request->only(['title', 'text', 'category_id']));

            $articleId = $Article->id;

            foreach ($tags as $tagId) {
                Article_tag::create([
                    'article_id'=> $articleId,
                    'tag_id'=> $tagId,
                ]);
            };

            return redirect()->route('blog.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
