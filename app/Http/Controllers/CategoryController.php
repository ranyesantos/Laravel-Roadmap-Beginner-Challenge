<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy("created_at","desc")->get();
        $title = "Manage Categories";
        $dataType = "Categories";
        return view('manage.create-category-tag', ['data' => $categories,'dataType' => $dataType ,'title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        if (!empty($name)){
            Category::create(['name'=>$name]);
        }
        return redirect()->Route('category.create');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->name;
        if (!empty($name)){
            Category::find($request->id)->update(['name' => $name]);
        }
        return redirect()->Route('category.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect()->Route('category.create');
    }
}
