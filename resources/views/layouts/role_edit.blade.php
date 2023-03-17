@include('include.header')
 <div class="content-wrapper">
   <div class="container">
   {{--  <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-5">
            <h1>Product Data</h1>
            <form method="post" action="/role/update/{{$role->id}}">
                @csrf

             <div class="row">
                 <div class="col-md-6">
                    <label>Role Name</label>
                    <input id="product_id" type="text" class="form-control" name="name" value="{{$role->name}}">
                 </div>
                 <div class="col-md-6">
                    <label>Permissions:</label><br>
                    @foreach($permissions as $permission)
                    <input id="permission" type="checkbox" class="form-check-input"  name="permission[]" value="{{$permission->id}}" @if($role->permissions->contains($permission)) checked @endif >
                    <label class="form-check-label">{{$permission->name}}</label><br>
                    @endforeach
                 </div>
            </div>

              <div class="row">

            </div>


            <div class="row">
                <div class="col-md">
                    <button class="btn btn-success float-end mt-3" id="btnsubmit">Submit</button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div> --}}
                  <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Role</h5>

                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name"  name="name" value="{{$role->name}}"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                           <label>Permissions:</label><br>
                    @foreach($permissions as $permission)
                    <input id="permission" type="checkbox" class="form-check-input"  name="permission[]" value="{{$permission->id}}" @if($role->permissions->contains($permission)) checked @endif >
                    <label class="form-check-label">{{$permission->name}}</label><br>
                    @endforeach

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->

              </div>
            </div>
        </div>
   </div>
</body>
</html>