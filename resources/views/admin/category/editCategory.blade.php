@extends('admin.master')

@section('content')

<div class="container col-lg-6">
  <h3 class="text-center text-success">{{Session::get('message')}}</h3>
  <hr>
  <div class="jumbotron">
    <h3 style="text-align: center;">Edit Category</h3>
 <form action="/category/{{$categoryById->id}}" method="POST" class="form-horizontal" name="editCategoryForm">
  @csrf
  @method('PUT')
   <div class="form-group">
    <div class="col-lg-4">
      <label for="name">Category Name :</label>
  </div>
      <div class="col-lg">
      <input type="text" class="form-control" placeholder="Category name" name="categoryName" value="{{$categoryById->categoryName}}">
    </div>
</div>
    <div class="form-group">
      <div class="col-lg-4">
      <label for="des">Category Description :</label>
  </div>
  <div class="col-lg">
      <textarea placeholder="Category Description" name="categoryDescription" class="form-control" rows="8">{{$categoryById->categoryDescription}}</textarea>
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
document.forms['editCategoryForm'].elements['status'].value= {!!$categoryById->status!!}
</script>

@endsection