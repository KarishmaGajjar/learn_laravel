
@extends('index')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Roles</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header"> <br>  @can('product add')<a href="create"><button class="btn btn-primary" type="submit">Add Product</button>@endcan</a></h5>

                <div class="table-responsive text-nowrap">
                  <table class="table data-table"  id="data-table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>category</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    </tbody>
                  </table>
                </div>
              </div>
              </div>
          </div>
          <script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('products.index') }}",
        columns: [
            {data:'product_id',name:'product_id'},
            {data: 'product_name', name: 'product_name'},
            {data: 'product_desc', name: 'product_desc'},
            {data: 'category', name: 'category'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>

@endsection
