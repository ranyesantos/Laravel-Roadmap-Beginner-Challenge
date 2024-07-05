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

        $articles = Article::orderBy("created_at","desc")->paginate(10);
        $categoryController = new CategoryController();
        $categories = $categoryController->index();
        $tagController = new TagController();
        $title = 'Home Page';
        $tags = $tagController->index();
        return view('blog.index', ['articles' => $articles, 'categories'=> $categories, 'tags' => $tags, 'title' => $title]);
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
        $tagsId = Article_tag::where('article_id', $id)->pluck('tag_id');
        $tags = Tag::whereIn('id', $tagsId)->pluck('name');
        $article = Article::findOrFail($id);
        $category = Category::findOrFail($article->category_id);

        return view ('article.show', ['article'=> $article, 'category'=> $category ,'tags'=> $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tagsId = Article_tag::where('article_id', $id)->pluck('tag_id');
        $articleTags = Tag::whereIn('id', $tagsId)->get();
        $article = Article::findOrFail($id);

        $tags = Tag::whereNotIn('id', $tagsId)->get();

        $articleCategory = Category::findOrFail($article->category_id);
        $categories = Category::where('id', '!=' , $article->category_id)->get();
        return view ('article.edit', ['article'=> $article, 'articleCategory'=> $articleCategory ,'articleTags'=> $articleTags, 'tags'=> $tags, 'categories'=> $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request->input('title');
        $text = $request->input('text');
        $category = $request->input('category_id');
        $tags = $request->input('tags', []);

        if (!empty($title) && !empty($text) && !empty($category)){
            Article::where('id', $id)->first()->update([
                'title' => $title,
                'text'=> $text,
                'category_id' => $category,
            ]);

            foreach ($tags as $tagId) {
                Article_tag::where('article_id', $id)->first()->update([
                    'tag_id'=> $tagId,
                ]);
            };
            return redirect()->route('blog.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::find($id)->delete();
        return redirect()->route('blog.index');
    }
}
