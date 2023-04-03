
@extends('index')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">
 <div class="flash-message"></div>
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Products</h4>
              <div class="card">
                <h5 class="card-header"> <br>  @can('product add')<a href="javascript:void(0)" id="createproduct" class="btn btn-primary" type="submit">Add Product</button>@endcan</a></h5>
                <div class="table-responsive text-nowrap">
                  <table class="table data-table"  id="data-table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>category</th>
                        <th>status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    </tbody>
                  </table>
                </div>
              <!-- form modal -->
                  <div class="modal fade" id="ajaxModel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="modelHeading"></h4>
                          </div>
                          <div class="modal-body">
                                  <form method="POST"  id="add-form">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="product_name">Name</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="product_name" name="product_name" />
                                    @error('product_name')
                                        <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="product_desc">Description</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="product_desc" name="product_desc" />
                                    @error('product_desc')
                                        <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                      @enderror
                                  </div>
                                </div>

                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="category">Category</label>
                                  <div class="col-sm-4">
                                      <select class="dropdown-item" name="category" id="category">
                                        @foreach($categories as $category)
                                          <option value="{{$category->id}}">{{$category->name}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                   <label class="col-sm-2 col-form-label" for="category">Status</label>
                                  <div class="col-sm-4">
                                    <select class="dropdown-item" name="status" id="status">
                                        @foreach($statuses as $status)
                                          <option value="{{$status->id}}">{{$status->status}}</option>
                                          @endforeach
                                     </select>
                                  </div>
                                </div>
                                <div class="row justify-content-end">
                                  <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" id="save-data">Save</button>
                                  </div>
                                </div>
                              </form>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>


<script type="text/javascript">
  $(function () {
    $('.success').hide();
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('products.index') }}",
        columns: [
            {data: 'product_name', name: 'product_name'},
            {data: 'product_desc', name: 'product_desc'},
            {data: 'category.name', name: 'category'},
            {data: 'status.status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#createproduct').click(function(){
      $('#id').val('');
      $('#modelHeading').html('Add Product');
      $('#ajaxModel').modal('show');
    });

    $('#save-data').click(function(e){
      e.preventDefault();
      $.ajax({
          data:$('#add-form').serialize(),
          url:"{{route('products.create')}}",
          type:"POST",
          datatype:"json",
          success:function (data) {
            $('#add-form').trigger("reset");
            $('#ajaxModel').modal('hide');
            $('.data-table').DataTable().ajax.reload();
          }
      });
    });

   $('body').on('click', '#edit-product', function () {
      var id = $(this).data('id');
      $.get('/edit/' +id, function (data) {
        console.log(data.category);
          $('#modelHeading').html("Edit Product");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#product_name').val(data.product_name);
          $('#product_desc').val(data.product_desc);
          $('#ajaxModel').find('select[name="category"] option[value="' + data.category + '"]').attr('selected', true);
          $('#ajaxModel').find('select[name="category"]').selectpicker('refresh');
      })
   });

   $('body').on('click','.product-delete',function(){
      var id=$(this).data('id');
      confirm("Do you want to delete this product");
      $.ajax({
        type:'get',
        url:'/delete/'+id,
        success:function(data){
          $('.data-table').DataTable().ajax.reload();
        }
      });
   });
  });
</script>
@endsection
