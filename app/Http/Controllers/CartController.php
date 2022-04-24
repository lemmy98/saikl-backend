<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class CartController extends Controller
{
    public function index() {
        $cart = session()->get('cart');
//        $cart = Cart::all();
//        session()->get('cart');
//        dd(session()->get('cart'));
//        $cart = Session::get();
//        $cart = Session::get('cart');
//        if ($cart == null){
//            $cart = [];
//        }
//
//        if($cart != null){
//            return ($cart);
//        }
//
//        $session_id = Session::getId();
//        dd($session_id);
//
        return ($cart);
    }


    public function addToCart(Request $request,  $id) {
        $product = Product::find($id);
        if(!$product){
            return response()->json('Product not found in Products List', 404);
        }

        $cart = Session::get('cart');
//        $cart = session()->get()('cart');
        if(!$cart){
            $cart[] = [
                    "name" => $product->name,
                    "price" => $product->name,
                    "quantity" => 1,
                    "image" => $product->name,
                    "description" => $product->description,
                    "releaseDate" => $product->releaseDate,
                    "category_id" => $product->category_id,
                    "product_id" => $product->id,
            ];


            session()->put('cart', $cart);
//            Session::put('cart',$cart);
            return response() -> json($cart);
//            return response()->json("First Product added to cart");
        }

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return response()->json("Product added to cart again");
        }

        $cart[$id] = [
                "name" => $product->name,
                "price" => $product->name,
                "quantity" => 1,
                "image" => $product->name,
                "description" => $product->description,
                "releaseDate" => $product->releaseDate,
                "category_id" => $product->category_id,
                "product_id" => $product->id,
            ];


//        dd($id  );
        $request->session()->put('cart', $cart);

        return response()->json("New Product added to cart");


//        $id = Product::get('id');
//        $session_id = Session::getId();
//
//        Session::put('cart.'.$id , $product);
//
//
//        session($id)->put('cart', $request->post('cart'));
//        return response()->json("product added to cart");
//        $product = Product::find($id);
//        Session::put('cart.'.$id , $product);
//
//        Session::push('cart.items', $product);
//
//        Session::get('cart.items'); // array
//        dd($request);
//        return response()->json("product added to cart");
    }

    public function updateCart(){

    }

    public function removeCart() {

    }

    public function clearAllCart() {

    }
}
