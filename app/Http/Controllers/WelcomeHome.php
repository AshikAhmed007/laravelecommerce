<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class WelcomeHome extends Controller
{
    public function index(){
        $products=Product::where('status',1)->get();
    	return view('frontEnd.home.homecontent',['products'=>$products]);
    }

     public function category($id){
        $productsByCategory=Product::where('categoryId',$id)->where('status',1)->get();
        return view('frontEnd.category.categoryContent',['productsByCategory'=>$productsByCategory]);
    }
	
	public function contact(){
    	
    	return view('frontEnd.contact.contactUs');
    	
	}
	public function productDetails(Product $product){
		return view('frontEnd.productDetails.prodectdetails',['product'=>$product]);

	}
}
