@extends('index')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Roles</h4>
              <div class="card">
                <h5 class="card-header"> <br>  @can('create')<a href="javascript:void(0)"  class="btn btn-primary" id="addrole" type="submit">Add Role</a>@endcan</h5>

                <div class="table-responsive text-nowrap">
                  <table class="table" id="table">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Roles</th>
                      @canany(['edit', 'create']) <th>Actions</th>@endcanany
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($roles as $role)
                      <tr>
                        <td>{{$role->id}}</td>
                        <td><a href="roles/edit/{{$role->id}}">{{$role->name}}</a></td>
                       @can('edit') <td>
                         <a class="btn btn-icon btn-secondary" href="roles/edit/{{$role->id}}"><i class="bx bx-edit-alt me-2"></i></a
                              >@endcan
                         @can('delete') <a class="btn btn-icon btn-danger" href="roles/delete/{{$role->id}}"><i class="bx bx-trash me-2"></i></a
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
          </div>
          {{-- Modal --}}
  <div class="modal fade" id="roleModel" aria-hidden="true">
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
                                    <input type="text" class="form-control" id="name" name="name" />
                                    @error('name')
                                        <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                      @enderror
                                  </div>
                                </div>
                           <div class="row mb-3">
                          <label class="col-sm-2 col-form-label me-5" for="basic-default-name">Permissions</label>
                          @foreach($permissions as $permission)
                          <div class="col-sm-10 ms-5">
                              <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="{{$permission->id}}" id="defaultCheck1" name="permission[]"/>
                            <label class="form-check-label" for="defaultCheck1"> {{$permission->name}} </label>
                          </div>
                          </div>
                          @endforeach
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
    <script type="text/javascript">
      $(function(){
          $('#addrole').on('click', function () {
              $('modelHeading').html('Add Role');
              $('#roleModel').modal('show');
          });
          $("#save-data").click(function(e){
            e.preventDefault();
            $.ajax({
              data:$('#add-form').serialize(),
              url: 'roles/insert',
              type: 'post',
              datatype:'json',
              success: function (data) {
                  $('#add-form').trigger('reset');
                  $('#roleModel').modal('hide');
                  $("#table").load(window.location + " #table");
              }
            });
          });

      });
    </script>
@endsection
