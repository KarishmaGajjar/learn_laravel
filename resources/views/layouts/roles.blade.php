@extends('index')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Roles</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header"> <br>  @can('create')<a href="roles/create"><button class="btn btn-primary" type="submit">Add new role</button>@endcan</a></h5>

                <div class="table-responsive text-nowrap">
                  <table class="table">
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
@endsection
