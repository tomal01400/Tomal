@extends('backend.layouts.master')
@section('add_product')


<form action="{{url('product/store')}}" method="POST" enctype="multipart/form-data" style="margin-left:100px;">
  @csrf
  <h1>Upload A New Product</h1>
<div class="form-group">
    <label for="name">name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
  </div>
  
  <div class="form-group">
    <label for="">Category:</label>
    <select name="category" id="" class="form-control">
        <option value="BMW">BMW</option>
        <option value="AUDI">AUDI</option>
        <option value="MARCITIES">MARCITIES</option>
        <option value="FERARRI">FERARRI</option>
        <option value="BUGADI">BUGADI</option>
        <option value="PAJARO">PAJARO</option>
        <option value="NISHAN">NISHAN</option>
        <option value="RANG ROVER">RANG ROVER</option>
        <option value="ROLLS ROYALS">ROLL ROYALS</option>
        <option value="TESLA">TESLA</option>
    </select>
  </div>

  <div class="form-group">
    <label for="Start Date">Start Date:</label>
    <input type="date" class="form-control"   name="start_date">
  </div>
  <div class="form-group">
    <label for="End Date">End Date:</label>
    <input type="date" class="form-control"   name="end_date">
  </div>
  <div class="form-group">
    <label for="price">Price:</label>
    <input type="number" class="form-control"  placeholder="Enter price" name="price">
  </div>

  <div class="form-group">
    <label for="descri[tion">Description:</label>
    <textarea  class="form-control"  placeholder="Enter product description" name="description" rows="4"></textarea>
  </div>

  <div class="form-group">
    <label for="image">Image:</label>
    <input type="file" class="form-control"   name="image" >
  </div>

  <div class="form-group">
    <label for="status">Status:</label>
    <select type="text" class="form-control" name="status">
      <option value="active">Active</option>
      <option value="inactive">Inactive</option>
    </select>  
  </div>
  
   <button type="submit" class="btn btn-info" >Add Product</button>
</form>
</div>
@endsection