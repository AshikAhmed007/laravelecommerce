<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;

class ProductController extends Controller
{
   public function createProduct()
    {
    	$categories=Category::where('status',1)->get();
    	$manufacturers=Manufacturer::where('status',1)->get();
        return view('admin.product.createProduct',['categories'=>$categories,'manufacturers'=>$manufacturers]); 
    }

    public function storeProduct(Request $req)
	 {
    
    if( $req->hasFile('productImage')){ 
        $productImage=$req->file('productImage'); 
        $ext=strtolower($productImage->getClientOriginalExtension()); 
    } else {
        $this->validateArticle();
      } 
    $product= new Product;
    $product->productName = $req->productName;
    $product->categoryId = $req->categoryId;
    $product->manufacturerId = $req->manufacturerId;
    $product->productPrice = $req->productPrice;
    $product->productQuantity = $req->productQuantity;
    $product->productShortDescription = $req->productShortDescription;
    $product->productLongDescription  = $req->productLongDescription;
    $product->productImage = $ext;
    $product->status = $req->status;
    $product->save($this->validateArticle());
   
    $imageName='pic-'.$product->id.'.'.$ext;
    $productImage->move(public_path('admin/images'),$imageName);
    $imageUrl=public_path('admin/images/').$imageName;
    return redirect('/product/add')->with('message','Product info saved successfully');
    
   	
  }

  public function manageProduct()
    {
      $products= Product::latest()->get();
      return view('admin.product.manageProduct',['products'=>$products]); 
    }


  public function viewProduct(Product $productById)
    {
      return view('admin.product.viewProduct',['productById'=>$productById]); 
    }


    public function editProduct(Product $productById){
      $categories=Category::where('status',1)->get();
      $manufacturers=Manufacturer::where('status',1)->get();
      return view('admin.product.editProduct',['productById'=>$productById,'categories'=>$categories,'manufacturers'=>$manufacturers]);
    }


    public function updateProduct(Request $req,Product $productById){
     
    $productById->productName = $req->productName;
    $productById->categoryId = $req->categoryId;
    $productById->manufacturerId = $req->manufacturerId;
    $productById->productPrice = $req->productPrice;
    $productById->productQuantity = $req->productQuantity;
    $productById->productShortDescription = $req->productShortDescription;
    $productById->productLongDescription  = $req->productLongDescription;
    $productById->status = $req->status;

    
    if( $req->hasFile('productImage')){ 
        $oldImage='admin/images/pic-'.$productById->id.'.'.$productById->productImage;
        unlink($oldImage);
        $productImage=$req->file('productImage'); 
        $ext=strtolower($productImage->getClientOriginalExtension()); 
        $imageName='pic-'.$productById->id.'.'.$ext;
        $productImage->move(public_path('admin/images'),$imageName);
        $imageUrl=public_path('admin/images/').$imageName;
        $productById->productImage=$req->file('productImage')->getClientOriginalExtension(); 
    } else{
        $oldImage='admin/images/pic-'.$productById->id.'.'.$productById->productImage;
    }
    $productById->update();
    return redirect('/product/manage')->with('message','Product info updated successfully');

  }



  public function deleteProduct(Product $productById){
    $productById->delete();
    $oldImage='admin/images/pic-'.$productById->id.'.'.$productById->productImage;
    unlink($oldImage);
    return redirect('/product/manage')->with('msg','Product info deleted successfully');
  }



  protected function validateArticle(){
  return request()->validate([
      'productName'=>'required',
      'productPrice'=>'required',
      'productQuantity'=>'required',
      'productShortDescription'=>'required',
      'productLongDescription'=>'required',
      'productImage'=>'required | mimes:jpeg,jpg,png,JPEG,JPG,PNG | max:4048',
     
      
      
    ]);

}
}

    
   
     