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
            <h1>Role</h1>
            <form method="post" action="{{url('role/insert')}}">
                @csrf

             <div class="row">
                 <div class="col-md-6">
                    <label>Role Name:</label>
                    <input id="role_id" type="text" class="form-control" name="name" placeholder="Role">
                 </div>
                 <div class="col-md-6">
                    <button class="btn btn-primary float-end mt-3" id="btnsubmit">Submit</button>
                </div>
            </div>
            <div class="row">

            </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

   </div>
</body>
</html>