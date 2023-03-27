@extends('layouts.app')
@section('content')
    <head>
    <title>crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

</head>
<body>
   <div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-5">
            <h1>Roles List</h1>
            @can('product add')
            <div class="col-md-4"><a href="{{url('/role/create')}}"><button class="btn btn-primary">New Role</button></a></div>
            @endcan
            <table class="table table-striped mt-3">
              <thead>
               <tr>
                <th>id</th>
               <th>Roles</th>
              @role('admin') <th>Action</th>@endrole

              </tr>
              </thead>
              <tbody>
           @foreach($roles as $role)
           <tr>
             <td>{{$role->id}}</td>
            <td><a style="text-decoration: none" href="role/permission/{{$role->id}}">{{$role->name}}</a></td>
            <td> <a href="/role/edit/{{$role->id}}" type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
          <a href="/role/delete/{{$role->id}}" type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
           </tr>
           @endforeach
           </tbody>
            </table>
        </div>
    </div>
   </div>
</body>
@endsection