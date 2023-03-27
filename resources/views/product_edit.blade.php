@extends('index')
@section('content')

       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Assign Roles</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Roles</h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="/update/{{$product->id}}" id="add_role">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Product Id</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="product_id" value="{{$product->product_id}}"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Name</label>
                          <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="product_name" value="{{$product->product_name}}"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Description</label>
                          <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="product_desc" value="{{$product->product_desc}}"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Category</label>
                          <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="category" value="{{$product->category}}"/>
                          </div>
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
