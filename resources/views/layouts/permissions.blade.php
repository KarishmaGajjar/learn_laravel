@extends('index')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Table Basic <br><a href="/permissions/create"><button class="btn btn-primary" type="submit">Add new Permission</button></a></h5>

                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Roles</th>
                        <th>Actions</th>
                       
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($permissions as $permission)
                      <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                        <td>
                         <a class="btn btn-icon btn-secondary" href="permissions/edit/{{$permission->id}}"><i class="bx bx-edit-alt me-2"></i></a
                              >
                          <a class="btn btn-icon btn-danger" href="permissions/delete/{{$permission->id}}"><i class="bx bx-trash me-2"></i></a
                              >
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
