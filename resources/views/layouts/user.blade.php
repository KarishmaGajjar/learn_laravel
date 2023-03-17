@extends('index')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Users <br><a href="roles/create"><button class="btn btn-primary" type="submit">Add new user</button></a></h5>

                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>id</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Roles</th>
                           <th>assign Role</th>
                           <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                     @foreach($users as $user)
                           <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($user->getRoleNames() as $role)
                                {{$role}}
                                @endforeach
                            </td>
                            <td><a href="users/assign_role/{{$user->id}}"class="btn btn-icon btn-secondary" type="submit"><i class="bx bx-edit-alt me-2"></i></a></td>
                            <td>@can('product edit') <a href="user/edit/{{$user->id}}"class="btn btn-icon btn-secondary" type="submit"><i class="bx bx-edit-alt me-2"></i></a>@endcan
                           <a href="user/delete/{{$user->id}}" class="btn btn-icon btn-danger" type="submit"><i class="bx bx-trash me-2"></i></a></td>
                           </tr>
                           @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
          </div>
@endsection
