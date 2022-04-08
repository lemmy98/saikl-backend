<?php

namespace App\Http\Controllers;


use App\Models\Product;
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
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $category = Category::create($data);
            return response()->json($category, 201);
        } catch (\Exception $exception) {
            return response()->json("An error occurRed");
        }
    }

    public function show($category_id) {
            $data = Product::where('category_id', $category_id)->get();
        return response()->json($data, 201);
        }

    public function destroy($id) {

        Category::where("id", $id)->firstorfail()->delete();
        return ("Successful delete");

    }
}
