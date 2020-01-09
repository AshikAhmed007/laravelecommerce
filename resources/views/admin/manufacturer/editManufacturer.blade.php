@extends('admin.master')

@section('content')

<div class="container col-lg-6">
  <h3 class="text-center text-success">{{Session::get('message')}}</h3>
  <hr>
  <div class="jumbotron">
    <h3 style="text-align: center;">Edit Manufacturer</h3>
 <form action="/manufacturer/{{$manufacturerById->id}}" method="POST" class="form-horizontal" name="editManufacturerForm">
  @csrf
  @method('PUT')
   <div class="form-group">
    <div class="col-lg-4">
      <label for="name">Manufacturer Name :</label>
  </div>
      <div class="col-lg">
      <input type="text" class="form-control" placeholder="Manufacturer name" name="manufacturerName" value="{{$manufacturerById->manufacturerName}}">
    </div>
</div>
    <div class="form-group">
      <div class="col-lg-4">
      <label for="des">Manufacturer Description :</label>
  </div>
  <div class="col-lg">
      <textarea placeholder="Manufacturer Description" name="manufacturerDescription" class="form-control" rows="8">{{$manufacturerById->manufacturerDescription}}</textarea>
    </div>
</div>

    <div class="form-group">
      <div class="col-lg-4">
      <label for="status">Publication Status :</label>
      </div >
        <div class="col-lg-12">
      <select name="status" class="form-control" >
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
document.forms['editManufacturerForm'].elements['status'].value= {!!$manufacturerById->status!!}
</script>

@endsection