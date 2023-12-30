<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
class CartController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('cart', ["cart" => $user->cart]);
    }
    //
    public function create($id){
        $product = Product::findOrFail($id);
        // $user->cart = $product;
        // $user -> save();

        $user = Auth::user();
        if($product && $user){
            error_log($product->price);
            $cart = $user->cart;
            $cart[] = ['id' => "$product->id", 'price' => "$product->price"];
            $user->cart = $cart;
            $user->save();
            return redirect('/');
        }
    }
}
