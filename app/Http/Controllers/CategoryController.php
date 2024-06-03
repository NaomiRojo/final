<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function shop()
    {
        $categories = Category::all();
        return view('shop')->with('categories', $categories);
    }

    public function getProductsByCategory($category_id)
{
    if ($category_id) {
        $products = Product::where('category_id', $category_id)->get();
    } else {
        $products = Product::all();
    }

    // No necesitas obtener todas las categorías aquí
    // Puedes simplemente retornar los productos
    return response()->json($products);
}

}
