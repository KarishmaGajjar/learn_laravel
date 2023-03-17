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
            <h1>Roles & Permission</h1>
            <form method="post" action="/role/addpermission/{{$role->id}}">
                @csrf

             <div class="row">
                 <div class="col-md-6">
                    <label>Role Name</label>
                    <input id="role_id" type="text" class="form-control" name="name" value="{{$role->name}}">
                 </div>
                  <div class="col-md-6">
                    <label>Permissions:</label><br>
                    @foreach($permissions as $permission)
                    <input id="permission" type="checkbox" class="form-check-input"  name="permission[]" value="{{$permission->id}}" @if($role->permissions->contains($permission)) checked @endif >
                    <label class="form-check-label">{{$permission->name}}</label><br>
                    @endforeach
                 </div>

            </div>

              <div class="row">

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