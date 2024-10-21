@extends('backend.layouts.master')
@section('product_edit')
<form action="{{ url('/product-update',$value->id) }}" method="POST" enctype="multipart/form-data" style="margin-left: 100px;">
    @csrf
    @method('PUT') 
    <h1>Update Product</h1>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" value="{{ $value->name }}" name="name">
    </div>
  
    <div class="form-group">
        <label for="category">Category:</label>
        <select name="category" id="category" class="form-control">
            <option value="BMW" {{ $value->category == 'BMW' ? 'selected' : '' }}>BMW</option>
            <option value="AUDI" {{ $value->category == 'AUDI' ? 'selected' : '' }}>AUDI</option>
            <option value="MARCITIES" {{ $value->category == 'MARCITIES' ? 'selected' : '' }}>MARCITIES</option>
            <option value="FERARRI" {{ $value->category == 'FERARRI' ? 'selected' : '' }}>FERARRI</option>
            <option value="BUGADI" {{ $value->category == 'BUGADI' ? 'selected' : '' }}>BUGADI</option>
            <option value="PAJARO" {{ $value->category == 'PAJARO' ? 'selected' : '' }}>PAJARO</option>
            <option value="NISHAN" {{ $value->category == 'NISHAN' ? 'selected' : '' }}>NISHAN</option>
        </select>
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" name="price" value="{{ $value->price }}">
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" rows="4">{{ $value->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control" name="image" accept="image/*">
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" name="status" required>
            <option value="active" {{ $value->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $value->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>  
    </div>
  
    <button type="submit" class="btn btn-info">Update Product</button>
</form>
@endsection
