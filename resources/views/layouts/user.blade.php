@extends('index')
@section('content')
 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Users List</h4>
              <div class="card">
                <h5 class="card-header">@can('add-user')<a href="/users/create"><button class="btn btn-primary" type="submit">Add new user</button></a>@endcan</h5>

                <div class="table-responsive text-nowrap">
                  <table class="table table-responsive">
                    <thead>
                      <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Roles</th>
                           @role('admin')<th>Roles</th>@endrole
                           @role('admin')<th>permissions</th>@endrole
                           @canany(['edit', 'add-user'])<th>Action</th>@endcanany
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                     @foreach($users as $user)
                           <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($user->getRoleNames() as $role)
                                {{$role}}
                                @endforeach
                            </td>
                            @role('admin')<td style="padding: 2px;"><a href="users/roles/{{$user->id}}"class="btn btn-icon btn-secondary" type="submit"><i class="bx bx-user-pin me-1"></i></a></td>@endrole
                            @role('admin') <td><a href="users/permissions/{{$user->id}}"class="btn btn-icon btn-secondary" type="submit"><i class="bx bx-key me-1"></i></a></td>@endrole
                            <td> @can('edit')<a href="users/edit/{{$user->id}}"class="btn btn-icon btn-secondary" type="submit"><i class="bx bx-edit-alt me-2"></i></a>@endcan
                           @can('delete')<a href="users/delete/{{$user->id}}" class="btn btn-icon btn-danger" type="submit"><i class="bx bx-trash me-2"></i></a>@endcan</td>
                           </tr>
                           @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
          </div>
@endsection
