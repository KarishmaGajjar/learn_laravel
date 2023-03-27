@extends('index')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Permissions</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Permissions List <br>@can('create')<a href="/permissions/create"><button class="btn btn-primary" type="submit">Add new Permission</button></a>@endcan</h5>

                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Roles</th>
                       @canany(['edit', 'create'])<th>Actions</th>@endcanany
                       
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($permissions as $permission)
                      <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                       @can('edit') <td>
                         <a class="btn btn-icon btn-secondary" href="permissions/edit/{{$permission->id}}"><i class="bx bx-edit-alt me-2"></i></a
                              >@endcan
                          @can('delete')<a class="btn btn-icon btn-danger" href="permissions/delete/{{$permission->id}}"><i class="bx bx-trash me-2"></i></a
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
@endsection
