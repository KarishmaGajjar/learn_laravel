@extends('index')
@section('content')
       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Add User</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Add User</h5>
                      <small class="text-muted float-end"></small>
                    </div>

                    <div class="card-body">
                      <form method="POST" action="/users/insert" id="user_add">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"  />
                             @error('name')
                                <span class="text-danger"> <strong>{{ $message }}</strong></span>
                             @enderror
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                          <div class="col-sm-10">
                               <input id="email" type="text" class="form-control @error('email') {{$message}} @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-password">Password</label>
                          <div class="col-sm-10">
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                               @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                        </div>
                       {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Permissions</label>
                        @foreach($permissions as $permission)
                        <div class="col-sm-10">
                            <div class="form-check mt-3">
                          <input class="form-check-input" type="checkbox" value="{{$permission->id}}" id="defaultCheck1" name="permission[]"/>
                          <label class="form-check-label" for="defaultCheck1"> {{$permission->name}} </label>
                        </div>
                        </div>
                        @endforeach
                      </div> --}}

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
@endsection
