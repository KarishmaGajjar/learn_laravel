@extends('index')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Permissions</h4>
              <div class="card">
                <h5 class="card-header"> <br>@can('create')<a href="javascript:void(0)" class="btn btn-primary" type="submit" id="addPermission">Add new Permission</a>@endcan</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table" id="table_permission">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Permissions</th>
                       @canany(['edit', 'create'])<th>Actions</th>@endcanany
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($permissions as $permission)
                      <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                       @can('edit') <td>
                         <a class="btn btn-icon btn-secondary" href="javascript:void(0)" id="editPermission" data-id="{{$permission->id}}"><i class="bx bx-edit-alt me-2"></i></a
                              >@endcan
                          @can('delete')<a class="btn btn-icon btn-danger" href="javascript:void(0)" id="deletePermission" data-id="{{$permission->id}}"><i class="bx bx-trash me-2"></i></a
                              >@endcan
                          </div>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
              {{-- modal --}}
           <div class="modal fade" id="permissionModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="modelHeading"></h4>
                      </div>
                      <div class="modal-body">
                       <form method="POST" id="permissionForm">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"/>
                          </div>
                           @error('name')
                                <span class="text-danger"> <strong>{{ $message }}</strong></span>
                             @enderror
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

          <script type="text/javascript">
            $(function(){
                // $('#permissionForm').validate({
                //   rules:{
                //     'name':{required:true}
                //   }
                // });
                $('#addPermission').on('click',function(){
                    $('#modelHeading').html('Add Permission');
                    $('#permissionModal').modal('show');
                    $('#id').val('');
                });

                $('body').on('click','#editPermission',function(){
                  var id=$(this).data('id');
                  console.log(id);
                  $.get('permissions/edit/'+id,function(data){
                    console.log(data);
                    $('#permissionModal').modal('show');
                    $('#modelHeading').html('Edit Permission');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                  })
                });

                $('body').on('click','#deletePermission',function(){
                  var id=$(this).data('id');
                  confirm("Delete Permission");
                  $.ajax({
                    url:'permissions/delete/'+id,
                    type:'get',
                    success:function(data){
                       $("#table_permission").load(window.location + " #table_permission");
                    }
                  });
                });

                $('#save-data').click(function (e) {
                  e.preventDefault();
                  $.ajax({
                    data:$('#permissionForm').serialize(),
                    url:"/insert",
                    type:'POST',
                    datatype:'json',
                    success:function(data){
                      $('#permissionModal').modal('hide');
                      $('#permissionForm').trigger('reset');
                      $("#table_permission").load(window.location + " #table_permission");
                    }
                  });

                });
            });
          </script>
@endsection
