<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(StoreProductRequest $request) {
        $product = Product::create( $request->all() );
        if ( $request->hasFile('image') ) {
            $file_name = (new \DateTime('now'))->format('YmdHis') . "-" . $product->id . "." . $request->image->extension();
            $product->image = $request->image->storeAs('products', $file_name, 'upload');
            $product->save();
        }
        return redirect()->route('products.index')->with(
            [
                'msg'    => 'Produto cadastrado com sucesso',
                'status' => 'success'
            ]
        );
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product) {
        $product->fill( $request->except('image'));
        $product->save();
        return redirect()->route('products.index')->with(
            [
                'msg'    => 'Produto editado com sucesso',
                'status' => 'success'
            ]
        );
    }

    public function destroy(Product $product) {

        if ( $product ) {
            $product->delete();
            return redirect()->route('products.index')->with([
                'msg'    => 'Produto deletado com sucesso',
                'status' => 'success'
            ]);
        } else {
            return redirect()->route('products.index')->with([
                'msg'    => 'Produto não encontrado na base de dados',
                'status' => 'errorr'
            ]);
        }
    }
}
