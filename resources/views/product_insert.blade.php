@extends('index')
@section('content')

       <div class="container-xxl flex-grow-1 container-p-y">
              @can('product add')<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Add Product</h4>@endcan

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Products</h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="/product/insert">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="product_name" />
                            @error('product_name')
                                <span class="text-danger"> <strong>{{ $message }}</strong></span>
                             @enderror
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Description</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="product_desc" />
                            @error('product_desc')
                                <span class="text-danger"> <strong>{{ $message }}</strong></span>
                             @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Category</label>
                          <div class="col-sm-4">
                             <select class="dropdown-item" name="category">
                              @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                                </select>
                          </div>
                        </div>
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
