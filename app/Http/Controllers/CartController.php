<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {
//        $session_id = Session::get('session_id');
//        dd($session_id);
//        $cart = Cart::all();
//        return ($cart);

//        $products = Product::get();
//        $session_id=Session::get('key');
//        dd($session_id);
//        $cart = session()->get('cart');
//        if ($cart == null)
//            $cart = [];
        $session_id = Session::getId();
        dd($session_id);
//
//        return ($cart);
    }

    public function addToCart(Request $request, $id) {
        $id = Product::get('id');
        $session_id = Session::getId();
        $product = Product::find($id);
        Session::put('cart.'.$id , $product);

        return response()->json("Product added to cart");
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
