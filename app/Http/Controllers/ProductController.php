<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('welcome', ['products' => $products]);
    }
    public function create(){
        return view('create');
    }
    public function store(){
        $product = new Product();
        $product -> url = request('url');
        $product -> name = request('name');
        $product -> details = request('details');
        $product -> price = request('price');
        $product -> instock = request('instock');
        $product -> save();
        return redirect('/')->with('msg', 'Product added');
    }
}
