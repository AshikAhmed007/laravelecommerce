@extends('admin.master')

@section('content')



<div class="container col-lg-6">
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
	<hr>
	<div class="jumbotron">
		<h3 style="text-align: center;">Insert Manufacturer</h3>

	{!! Form::open(['url'=>'manufacturer/save','method'=>'POST','class'=>'form-horizontal'])!!}
	
	<div class="form-group row">
		<div class="col-lg-3">
      <label for="name">Manufacturer Name :</label>
  </div>
      <div class="col-lg-9">
      <input type="text" class="form-control" placeholder="Manufacturer name" name="manufacturerName">
      @error('manufacturerName')
      <p class="text-danger">{{$errors->first('manufacturerName')}}</p>
      @enderror
    </div>
</div>




    <div class="form-group row">
    	<div class="col-lg-3">
      <label for="des">Manufacturer Description :</label>
  </div>
  <div class="col-lg-9">
      <textarea placeholder="Manufacturer Description" name="manufacturerDescription" class="form-control" rows="8"></textarea>
       @error('manufacturerDescription')
      <p class="text-danger">{{$errors->first('manufacturerDescription')}}</p>
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

    <div class="form-group row">
    	<div class="col-lg-3">
      <label for="status">Publication Status :</label>
      </div >
      	<div class="col-lg-9">
      <select name="status" class="form-control">
      	<option>Select Publication Status</option>
      	<option value="1">published</option>
      	<option value="0">unpublished</option>
      </select>
    </div>
</div>

    <div class="form-group">
    
	<button type="submit" class="btn btn-info btn-block" name="btn">submit</button>
</div>
</div>
</div>

{!! Form::close()!!}

@endsection