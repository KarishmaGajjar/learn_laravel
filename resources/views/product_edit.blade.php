<html>
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
            <form method="post" action="/update/{{$product->id}}">
                @csrf
                <div class="row">
                 <div class="col-md">
                    <label>Product id:</label>
                    <input id="id" type="text" class="form-control" name="product_id" value="{{$product->product_id}}">
                 </div>
            </div>
             <div class="row">
                 <div class="col-md-6">
                    <label>Product Name</label>
                    <input id="product_id" type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
                 </div>
                 <div class="col-md-6">
                    <label>Proudct Description:</label>
                    <input id="product_desc" type="text" class="form-control" name="product_desc" value="{{$product->product_desc}}">
                 </div>
            </div>

              <div class="row">

            </div>
             <div class="row">
                 <div class="col-md-6">
                    <label>Category:</label>
                    <input id="category" type="text" class="form-control" name="category" value="{{$product->category}}">
                 </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <button class="btn btn-success float-end mt-3" id="btnsubmit">Submit</button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

   </div>
</body>
</html>