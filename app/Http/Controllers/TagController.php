<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::get();
        return $tags;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::orderBy('created_at', 'desc')->get();
        $title = "Manage Tags";
        $dataType = "Tags";
        return view('manage.create-category-tag', ['data' => $tags,'dataType' => $dataType ,'title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!empty($request)){
            Tag::create(['name' => $request->name]);
        }
        return redirect()->route('tag.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!empty($request)){
            Tag::find($id)->update(['name' => $request->name]);
        }
        return redirect()->route('tag.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tag::find($id)->delete();
        return redirect()->route('tag.create');
    }
}
