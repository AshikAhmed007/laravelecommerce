@extends('admin.master')

@section('content')



<div class="container col-lg-6">
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
	<hr>
	<div class="jumbotron">
		<h3 style="text-align: center;">Insert Product</h3>
    
	
<form action="/product/save" method="POST" class="form-horizontal" onsubmit="return validate();" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <div class="col-lg-4">
      <label for="name">Product Name :</label>
  </div>
      <div class="col-lg">
      <input type="text" class="form-control" placeholder="Product name" name="productName" value="{{old('productName')}}">
      @error('productName')
      <p class="text-danger">{{$errors->first('productName')}}</p>
      @enderror
    </div>
</div>

 <div class="form-group">
      <div class="col-lg-4">
      <label for="status">Category Name :</label>
      </div >
        <div class="col-lg-12">
      <select name="categoryId" class="form-control" id="selection1">
        <option value="">Select Category Name</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->categoryName}}</option>
        @endforeach
      </select>
    </div>
</div>

<div class="form-group">
      <div class="col-lg-4">
      <label for="status">Manufacturer Name :</label>
      </div >
        <div class="col-lg-12">
      <select name="manufacturerId" class="form-control" id="selection2">
        <option value="">Select Manufacturer Name</option>
        @foreach($manufacturers as $manufacturer)
        <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturerName}}</option>
        @endforeach
      </select>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-4">
      <label for="name">Product Price :</label>
  </div>
      <div class="col-lg">
      <input type="number" class="form-control" placeholder="Product Price" name="productPrice" value="{{old('productPrice')}}">
      @error('productPrice')
      <p class="text-danger">{{$errors->first('productPrice')}}</p>
      @enderror
    </div>
</div>

<div class="form-group">
    <div class="col-lg-4">
      <label for="name">Product Quantity :</label>
  </div>
      <div class="col-lg">
      <input type="number" class="form-control" placeholder="Product Quantity" name="productQuantity" value="{{old('productQuantity')}}">
      @error('productQuantity')
      <p class="text-danger">{{$errors->first('productQuantity')}}</p>
      @enderror
    </div>
</div>

<div class="form-group">
      <div class="col-lg-4">
      <label for="des">Product Short Description :</label>
  </div>
  <div class="col-lg">
      <textarea placeholder="Product Short Description" id="textarea" name="productShortDescription" class="form-control" rows="8">{{old('productShortDescription')}}</textarea>
       @error('productShortDescription')
      <p class="text-danger">{{$errors->first('productShortDescription')}}</p>
      @enderror
    </div>
</div>
	
<div class="form-group">
      <div class="col-lg-4">
      <label for="des">Product Long Description :</label>
  </div>
  <div class="col-lg">
      <textarea placeholder="Product Long Description" id="textarea1" name="productLongDescription" class="form-control" rows="8">{{old('productLongDescription')}}</textarea>
       @error('productLongDescription')
      <p class="text-danger">{{$errors->first('productLongDescription')}}</p>
      @enderror
    </div>
</div>

<div class="form-group">
    <div class="col-lg-4">
      <label for="name">Product Image :</label>
  </div>
      <div class="col-lg">
      <input type="file"   name="productImage" accept="image/*" onchange="loadfile(event)">
      <img id="image" style="display: none" width="100px" height="100px" >

      <script type="text/javascript">
        function loadfile(event){
          var output = document.getElementById('image');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.style.display="block";
        };
      </script>
      
      @error('productImage')
      <p class="text-danger">{{$errors->first('productImage')}}</p>
      @enderror
    </div>
</div>
   
   <div class="form-group">
      <div class="col-lg-4">
      <label for="status">Publication Status :</label>
      </div >
        <div class="col-lg-12">
      <select name="status" class="form-control" id="selection3" >
        <option value="">Select Publication Status</option>
        <option value="1">published</option>
        <option value="0">unpublished</option>
      </select>
        </div>
    </div>

    <div class="form-group">
    <div class="col-lg">
	<button type="submit" class="btn btn-success btn-block" name="btn">submit</button>
</div>
</div>
</div>
</div>
</form>
<script type="text/javascript">
  function validate(){
    let s1=document.getElementById('selection1').value;
    let s2=document.getElementById('selection2').value;
    let s3=document.getElementById('selection3').value;

    if(s1=="" ){
      alert("Please Select Category");
      return false;
    }else if(s2==""){
      alert("Please Select Manufacturer");
      return false;
    }else if(s3==""){
      alert("Please Select Publication Status");
      return false; 
    }
    return true;
  }
</script>
@endsection