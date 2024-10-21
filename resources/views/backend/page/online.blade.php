<!DOCTYPE html>
<html lang="en">
<head>
  <title>Prouct Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Price</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $key=>$value)
      <tr>
        <td>{{++$key}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->category}}</td>
        <td>{{$value->start_date}}</td>
        <td>{{$value->end_date}}</td>
        <td>{{$value->price}}</td>
        
        <td>
        @if(isset($value->image) && !empty($value->image))
        <img src="{{ asset('/'.$value->image) }}" alt="Null image" width=100;>
        @else
        No Image
        @endif
        </td>
        
        
        <td>{{$value->status}}</td>
        <td>
            <a href="{{url('product-edit',$value->id)}}" class="btn btn-info">Edit</a> 
            <form action="{{url('product-delete',$value->id)}}"  method="post">
            @csrf @method('delete') 
            <button type="submit" class="btn btn-danger">DELETE</button>
          </form>
        </td>    
        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
