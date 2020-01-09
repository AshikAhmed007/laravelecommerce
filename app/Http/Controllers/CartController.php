<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $req){
    	$product=Product::find($req->productId);
    	Cart::add([
    		'id'=>$product->id,
    		'name'=>$product->productName,
    		'price'=>$product->productPrice,
    		'qty'=>$req->qty,
    		'weight' => 0,
    		'options'=>[
    			'image'=>$product->productImage
    		]
    		
    	]);

    	return redirect('/show-cart');
    	    }




    public function showCart(){
    	$carts=Cart::content();
    	return view('frontEnd.cart.show-cart',['carts'=>$carts]);
    }

    public function updateCart(Request $req){
    	Cart::update($req->rowId,$req->qty);
    	return redirect('/show-cart');
    }

    public function deleteCart($id){
    	Cart::remove($id);
    	return redirect('/show-cart');
    }
}
 