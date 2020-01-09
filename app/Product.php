<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable=['productName','productDescription','productPrice','productQuantity'];

     public function category(){
     	return $this->belongsTo(Category::class,'categoryId');
     }

      public function manufacturer(){
     	return $this->belongsTo(Manufacturer::class,'manufacturerId');
     }
}
