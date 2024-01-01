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
        return view('cart', ["carts" => $user->cart]);
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
            //I had to do add the contents individually cos i had tons of issues when I tried to add the entire product .... the easier route is probably the better route.
            $cart[] = ['id' => "$product->id",
                       'price' => "$product->price", 
                       'img' => "$product->url", 
                       'name' => "$product->name", 
                       'details' => "$product->details", 
                       'instock' => "$product->instock"
                    ];
            $user->cart = $cart;
            $user->save();
            return redirect('/');
        }
    }
}
