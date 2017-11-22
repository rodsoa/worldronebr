<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\RentalProduct;

class RentalProductsController extends Controller
{
    public function index() {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('rental.index', compact('products'));
    }

    public function toRent(Request $request, Product $product) {
        $rental = new RentalProduct();
        $rental->user_id = $request->user()->id;
        $rental->product_id = $product->id;
        $rental->save();

        return redirect()->route('rental.index')->with([
            'msg'    => 'Requisição de aluguel processada',
            'status' => 'success'
        ]);
    }
}
