<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;




class ProductController extends Controller
{

    public function index(Request $request){
        try {
            $products = Product::all();
            return response()->json($products, 201);
        } catch (\Exception $exception) {
            return response()->json("An error occured");
        }
    }
    public function store(Request $request) {
        try {
            $data = $request->all();
            $data['category_id'] = 1;
            $product = Product::create($data);
            return response() -> json($product, 201);
        } catch (\Exception $exception) {
            return response()->json("An error occured");
        }
    }
}
