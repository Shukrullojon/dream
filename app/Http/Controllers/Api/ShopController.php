<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function get(){
        $products = Product::with('media')->where('status',1)->inRandomOrder()->take(6)->get();
        return response()->json([
            'status' => true,
            'result' => [
                'products' => $products,
            ],
        ], 200);
    }

    public function category(){
        $categories = Category::with('products')
            ->with('products.media')
            ->where('status',1)
            ->get();
        return response()->json([
            'status' => true,
            'result' => [
                'categories' => $categories,
            ],
        ], 200);
    }

    public function product(Request $request){
        $product = Product::with('media')->where('id',$request->id)->first();
        return response()->json([
            'status' => true,
            'result' => [
                'product' => $product,
            ],
        ], 200);
    }
}
