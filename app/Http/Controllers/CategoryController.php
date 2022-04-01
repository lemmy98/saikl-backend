<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request){
        try {
            $categories = Category::all();
            return response()->json($categories, 201);
        } catch (\Exception $exception) {
            return response()->json("An error occured");
        }
    }
    public function store(Request $request) {
        try {
            $data = $request->all();
            $category = Category::create($data);
            return response() -> json($category, 201);
        } catch (\Exception $exception) {
            return response()->json("An error occured");
        }

    //     $data = $request->all();
    //     return Article::create([
    //         'title' => $data['title'],
    //         'body' => $data['body'],
    //     ]);

    //     $article = Article::save();
    //    return response()->json($article, 201);
    }
}
