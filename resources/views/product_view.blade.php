@extends('layouts.app')
@section('content')
    <head>
    <title>crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
   <div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-5">
            <h1>Product Data</h1>
            @can('product add')
            <div class="col-md-4"><a href="{{url('/create')}}"><button class="btn btn-primary">Insert</button></a></div>
            @endcan
            <table class="table table-striped mt-3">
              <thead>
               <tr>
               <th>id</th>
               <th>Name</th>
               <th>Description</th>
               <th>category</th>
               <th>Action</th>
              </tr>
              </thead>
              <tbody>
           @foreach($products as $product)
           <tr>
            <td>{{$product->product_id}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_desc}}</td>
            <td>{{$product->category}}</td>
            <td>@can('product edit') <a href="edit/{{$product->id}}" class="btn btn-success" type="submit">Edit</a>@endcan
            @can('product delete')<a href="delete/{{$product->id}}" class="btn btn-danger" type="submit">Delete</a>@endrole</td>
           </tr>
           @endforeach
           </tbody>
            </table>
        </div>
    </div>
   </div>
</body>
@endsection