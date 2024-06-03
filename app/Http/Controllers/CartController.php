<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop()
    {
        $categories = Category::all();
        $products = Product::all();
        //return view('shop')->with('SHOP')->with(['products' => $products], ['categories' => $categories]);

        return view('shop', ['products' => $products, 'categories' => $categories]);
    }

    public function cart()
    {
        $cartCollection = \Cart::getContent();

        return view('cart')->with('CART ')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'producto quitado');
    }

    public function add(Request $request)
    {
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'producto agregado al carrito');
    }

    public function update(Request $request)
    {
        \Cart::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            )
        );
        return redirect()->route('cart.index')->with('success_msg', 'listo');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'vaciado');
    }

    public function transaction()
    {

        //return redirect()->route('cart.index')->with('success_msg', 'Escaneé el codigo qr para completar la compra');
        $cartCollection = \Cart::getContent();

        return view('transaction')->with('CART ')->with(['cartCollection' => $cartCollection]);;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%' . $query . '%')->get();
        return view('search-results', compact('products'));
    }
}
