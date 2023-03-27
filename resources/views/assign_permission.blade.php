@extends('index')
@section('content')
       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Assign Role</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Assign Role</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="/users/assign_permission/{{$user->id}}">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                          <div class="col-sm-8">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">{{$user->name}}</label>
                          </div>
                        </div>
                         <div class="row mb-3">
                          <h4><strong><label class="col-sm-2 col-form-label" for="basic-default-name"><b>Roles:</b></label></strong></h4><br>
                          @foreach($permissions as $permission)
                          <div class="col-sm-10 ms-4">
                              <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" value="{{$permission->id}}" id="defaultCheck1" name="permission[]" @if($user->getAllPermissions()->contains($permission)) checked @endif/>
                            <label class="form-check-label" for="defaultCheck1"> {{$permission->name}} </label>
                          </div>
                          </div>
                          @endforeach
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add</button>

                             {{-- <a href="/users/remove_role/{{$user->id}}"type="submit" class="btn btn-primary" >Remove Role</a> --}}
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
@endsection
