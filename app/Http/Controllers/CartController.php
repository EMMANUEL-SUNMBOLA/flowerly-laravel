<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
class CartController extends Controller
{
    //
    public function create($id){
        $product = Product::findOrFail($id);
        $user->cart = $product;
    }
}
