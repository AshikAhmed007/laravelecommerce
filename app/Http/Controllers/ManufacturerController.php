<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;

class ManufacturerController extends Controller
{
    public function createManufacturer()
    {
        return view('admin.manufacturer.createManufacturer'); 
    }

    public function storeManufacturer()
	 {

   	$manufacturer= new Manufacturer(); 
	Manufacturer::create($this->validateArticle());
   	return redirect('/manufacturer/add')->with('message','Manufacturer info saved successfully');
  }

  public function manageManufacturer()
    {
    	$manufacturer= Manufacturer::latest()->get();
        return view('admin.manufacturer.manageManufacturer',['manufacturer'=>$manufacturer]); 
    }

    public function editManufacturer(Manufacturer $manufacturerById){
    	
    	return view('admin.manufacturer.editManufacturer',['manufacturerById'=>$manufacturerById]);
    	
    }

  public function updateManufacturer(Manufacturer $manufacturerById ){
  $manufacturerById->update($this->validateArticle());
  return redirect('/manufacturer/manage')->with('message','Manufacturer info update successfully');
  }

  public function deleteManufacturer(Manufacturer $manufacturerById ){
  $manufacturerById->delete();
  return redirect('/manufacturer/manage')->with('msg','Manufacturer info deleted successfully');
  }


  protected function validateArticle(){
  return request()->validate([
   		'manufacturerName'=>'required',
   		'manufacturerDescription'=>'required',
   		'status'=>'required'
   		
   	]);

}
}
 