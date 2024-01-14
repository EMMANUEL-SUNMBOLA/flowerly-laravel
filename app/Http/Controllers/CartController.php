<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;


class CartController extends Controller{
    // 
    public function index(){
        $userCart = Auth::user()->cart;
        $price = 0;
        if(!empty($userCart)){
            foreach($userCart as $cartItem){
                if(!empty($cartItem)){
                    $price += $cartItem['price'];
                    error_log($price);
                }
            }
            return view('cart', ["carts" => $userCart, "price" => $price]);
        }
        return view('cart', ["carts" => $userCart, "price" => $price]);
    }
    //
    public function cave($id)    {
        $product = Product::findOrFail($id);
    
        $userCart = Auth::user()->cart ?? []; // Handle empty cart for new users
    
        if (!empty($userCart)) {
            foreach ($userCart as &$cartItem) {
                if ($id == $cartItem['id']) {
                    $cartItem['ammount']++;
                    Auth::user()->cart = $userCart; // Update cart before saving
                    Auth::user()->save();
                    return redirect()->back()->with('success', 'Item quantity updated');
                    break; // Exit the loop as item is found and updated
                }
            }
        }
    
        // Item not in cart, add it
        $userCart[] = [
            'id' => $product->id,
            'price' => $product->price,
            'img' => $product->url,
            'name' => $product->name,
            'details' => $product->details,
            'instock' => $product->instock,
            'ammount' => 1
        ];
    
        Auth::user()->cart = $userCart;
        Auth::user()->save();
    
        return redirect()->back()->with('success', 'Item added to cart');
    }
    //
    public function create($id){
        $product = Product::findOrFail($id);
        $userCart = Auth::user()->cart ?? [];
        $itemInCart = false;
        //php shorthand to check if somthing is empty, if so it makes it an mpty array
        if(!empty($userCart)){
                foreach($userCart as  &$cartItem){
                    if((!empty($cartItem)) && ($id == $cartItem['id'])){
                        $cartItem['ammount']++; #after increment you still have to reinitialize, IDK it sha works
                        $cartItem['price'] = $product->price * $cartItem['ammount'];
                        Auth::user()->cart = $userCart;
                        Auth::user()->save();
                        $itemInCart = true;
                        return redirect()->back()->with('success', "Item added to cart !");
                        break;
                    }
                }
                //I had to do add the contents individually cos i had tons of issues when I tried to add the entire product .... the easier route is probably the better route.
                if(!$itemInCart){
                    $userCart[] = [
                        'id' => "$product->id",
                        'price' => "$product->price", 
                        'img' => "$product->url", 
                        'name' => "$product->name", 
                        'details' => "$product->details", 
                        'instock' => "$product->instock",
                        'ammount' => 1
                    ];
                    Auth::user()->cart = $userCart;
                    Auth::user()->save();
                    //this returns users back to the page they came from
                    return redirect()->back()->with('success', "Added Successfuly");
                }
            }
                $userCart[] = [
                    'id' => "$product->id",
                    'price' => "$product->price", 
                    'img' => "$product->url", 
                    'name' => "$product->name", 
                    'details' => "$product->details", 
                    'instock' => "$product->instock",
                    'ammount' => 1
                ];
            Auth::user()->cart = $userCart;
            Auth::user()->save();
            //this returns users back to the page they came from
            return redirect()->back()->with('success', "Item added to cart !");
    }
    //
    public function reduce($id){
        $product = Product::findOrFail($id);
        $userCart = Auth::user()->cart ?? [];
        //php shorthand to check if somthing is empty, if so it makes it an mpty array
            if(!empty($userCart)){
                foreach($userCart as  &$cartItem){
                    if($id == $cartItem['id']){
                        if($cartItem['ammount'] > 1){
                            $cartItem['ammount']--; #after increment you still have to reinitialize, IDK it sha works
                            $cartItem['price'] = $product->price * $cartItem['ammount'];
                            Auth::user()->cart = $userCart;
                            Auth::user()->save();
                            return redirect()->back();
                            break;
                        }
                    }
                }
            }
    }
    //
    public function destroy($id){
        $userCart = Auth::user()->cart ?? []; // Get user's cart (initially as an array)
        if (!empty($userCart)) {
            foreach ($userCart as $key => &$cartItem) {
                if ((!empty($cartItem)) && ($id == $cartItem['id'])) {
                    //after hours of trial , this was the only method that worked !O!M!O! fuck 
                    unset($userCart[$key]);
                    Auth::user()->cart = $userCart;
                    Auth::user()->save();
    
                    return redirect()->back()->with('success', 'Item removed successfully');
                }
            }
            return redirect()->back()->with('err', 'Item not found in cart');
        } else {
            return redirect()->back()->with('err', 'Cart is empty');
        }
    }
    // 
}
