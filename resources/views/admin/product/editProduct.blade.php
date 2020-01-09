@extends('admin.master')

@section('content')

<div class="container col-lg-6">
  <h3 class="text-center text-success">{{Session::get('message')}}</h3>
  <hr>
  <div class="jumbotron">
    <h3 style="text-align: center;">Edit Product Information</h3>
 <form action="/product/{{$productById->id}}" method="POST" class="form-horizontal" name="editCategoryForm" enctype="multipart/form-data">
  @csrf
  @method('PUT')
   <div class="form-group">
    <div class="col-lg-4">
      <label for="name">Product Name :</label>
  </div>
      <div class="col-lg">
      <input type="text" class="form-control" placeholder="Product name" name="productName" value="{{$productById->productName}}">
     
    </div>
</div>

 <div class="form-group">
      <div class="col-lg-4">
      <label for="status">Category Name :</label>
      </div >
        <div class="col-lg-12">
      <select name="categoryId" class="form-control">
        <option>Select Category Name</option>
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
      <select name="manufacturerId" class="form-control">
        <option>Select Manufacturer Name</option>
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
      <input type="number" class="form-control" placeholder="Product Price" name="productPrice" value="{{$productById->productPrice}}">
      
    </div>
</div>

<div class="form-group">
    <div class="col-lg-4">
      <label for="name">Product Quantity :</label>
  </div>
      <div class="col-lg">
      <input type="number" class="form-control" placeholder="Product Quantity" name="productQuantity" value="{{$productById->productQuantity}}">
    </div>
</div>

<div class="form-group">
      <div class="col-lg-4">
      <label for="des">Product Short Description :</label>
  </div>
  <div class="col-lg">
      <textarea placeholder="Product Short Description" id="textarea" name="productShortDescription" class="form-control" rows="8">{{$productById->productShortDescription}}</textarea>
    </div>
</div>
  
<div class="form-group">
      <div class="col-lg-4">
      <label for="des">Product Long Description :</label>
  </div>
  <div class="col-lg">
      <textarea placeholder="Product Long Description" id="textarea1" name="productLongDescription" class="form-control" rows="8">{{$productById->productLongDescription}}</textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-4">
      <label for="name">Product Image :</label>
  </div>
      <div class="col-lg-4">
      <input type="file"   name="productImage" accept="image/*" onchange="loadfile(event)">
     <img src="/admin/images/{{'pic-'.$productById->id.'.'.$productById->productImage}}" alt="" id="image" width="100px" height="100px">
     <p><small>current image: <a href="/admin/images/{{'pic-'.$productById->id.'.'.$productById->productImage}}">{{'pic-'.$productById->id.'.'.$productById->productImage}}</a></small></p>
      <script type="text/javascript">
        function loadfile(event){
          var output = document.getElementById('image');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.style.display="block";
        };

      </script>
    </div>
</div>
   
   <div class="form-group">
      <div class="col-lg-4">
      <label for="status">Publication Status :</label>
      </div >
        <div class="col-lg-12">
      <select name="status" class="form-control">
        <option>Select Publication Status</option>
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
document.forms['editCategoryForm'].elements['categoryId'].value= {!!$productById->categoryId!!}
document.forms['editCategoryForm'].elements['manufacturerId'].value= {!!$productById->manufacturerId!!}
document.forms['editCategoryForm'].elements['status'].value= {!!$productById->status!!}
</script>

@endsection