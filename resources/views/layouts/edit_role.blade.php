@extends('index')
@section('content')
       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Roles</h4>
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Roles</h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <form method="post" action="/roles/update/{{$role->id}}">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="name"  value="{{$role->name}}"/>
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Permissions:</label>
                          @foreach($permissions as $permission)
                          <div class="col-sm-10 ms-5">
                              <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="{{$permission->id}}" id="defaultCheck1" name="permission[]" @if($role->permissions->contains($permission)) checked @endif/>
                            <label class="form-check-label" for="defaultCheck1"> {{$permission->name}} </label>
                          </div>
                          </div>
                          @endforeach
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
@endsection
