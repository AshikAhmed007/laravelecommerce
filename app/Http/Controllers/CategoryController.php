<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function createCategory()
    {
        return view('admin.category.createCategory'); 
    }

    public function storeCategory()
	 {

   	$category= new Category(); 
	 Category::create($this->validateArticle());
   	return redirect('/category/add')->with('message','Category info saved successfully');
  }

  public function manageCategory()
    {
    	$category= Category::latest()->get();
        return view('admin.category.manageCategory',['category'=>$category]); 
    }

    public function editCategory(Category $categoryById){
    	
    	return view('admin.category.editCategory',['categoryById'=>$categoryById]);
    	// return view('admin.category.editCategory'); 
    }

  public function updateCategory(Category $categoryById ){
  $categoryById->update($this->validateArticle());
  return redirect('/category/manage')->with('message','Category info update successfully');
  }

  public function deleteCategory(Category $categoryById ){
  $categoryById->delete();
  return redirect('/category/manage')->with('msg','Category info deleted successfully');
  }


  protected function validateArticle(){
  return request()->validate([
   		'categoryName'=>'required',
   		'categoryDescription'=>'required',
   		'status'=>'required'
   		
   	]);

}
}
 