@extends('index')
@section('content')
<body>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Users</h4>
            <div class="card">
                <h5 class="card-header"> <br>  @can('create')<a href="javascript:void(0)"  class="btn btn-primary" id="addrole" type="submit">Add User</a>@endcan</h5>
                <div class="table-responsive text-nowrap p-3">
                    {{$dataTable->table()}}
                 </div>
            </div>
    </div>
  {{-- getdata(render data from DB) --}}
  {{ $dataTable->scripts() }}
</body>
@endsection
