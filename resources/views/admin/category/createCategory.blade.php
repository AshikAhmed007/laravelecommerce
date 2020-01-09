@extends('admin.master')

@section('content')



<div class="container col-lg-6">
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
	<hr>
	<div class="jumbotron">
		<h3 style="text-align: center;">Insert Category</h3>

	{!! Form::open(['url'=>'category/save','method'=>'POST','class'=>'form-horizontal'])!!}
	
	<div class="form-group">
		<div class="col-lg-4">
      <label for="name">Category Name :</label>
  </div>
      <div class="col-lg">
      <input type="text" class="form-control" placeholder="Category name" name="categoryName">
      @error('categoryName')
      <p class="text-danger">{{$errors->first('categoryName')}}</p>
      @enderror
    </div>
</div>




    <div class="form-group">
    	<div class="col-lg-4">
      <label for="des">Category Description :</label>
  </div>
  <div class="col-lg">
      <textarea placeholder="Category Description" name="categoryDescription" class="form-control" rows="8"></textarea>
       @error('categoryDescription')
      <p class="text-danger">{{$errors->first('categoryDescription')}}</p>
      @enderror
    </div>
</div>

	<!--  <div class="form-group">
      <label for="name">Image :</label>
      <input type="file" name="pic" multiple accept="images/*" onchange="loadfile(event)">
      <img id="image" style="display: none" width="100px" height="100px">
      <script type="text/javascript">
      	function loadfile(event){
      		var output = document.getElementById('image');
      		output.src = URL.createObjectURL(event.target.files[0]);
      		output.style.display="block";
      	};

      </script>

    </div> -->

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

{!! Form::close()!!}

@endsection