@extends('index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Data</h4>
              <div class="card p-4">
                <div class="row">
                  <div class="col-md-4">
                <h5 class="card-header"> <br>  @can('add-user')<a href="javascript:void(0)" id="create" class="btn btn-primary" type="submit">Add</button>@endcan</a></h5>
              </div>
            </div>
                <div class="table-responsive text-nowrap">
                  <table class="table data-table"  id="data-table">
                    <thead>
                      <tr>
                        <th>Index</th>
                        <th>id</th>
                        <th>name</th>
                        <th>city</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        {{-- modal --}}
          <div class="modal fade" id="Model" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="modelHeading"></h4>
                          </div>
                          <div class="modal-body">
                                  <form method="POST" id="add-form">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="name">Name</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" />
                                    @error('name')
                                        <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                      @enderror
                                  </div>
                                </div>
                                       <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="city">City</label>
                                  <div class="col-sm-4">
                                      <select class="dropdown-item" name="city" id="city">
                                        @foreach($cities as $city)
                                          <option value="{{$city->id}}">{{$city->city}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  </div>
                                </div>

                                <div class="row justify-content-end">
                                  <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" id="save-data">Save</button>
                                  </div>
                                </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
<script type="text/javascript">
    $(function(){
        var table=$('.data-table').DataTable({

            ajax: { url:"{{ route('demo.index') }}"
                },
            columns:[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data:'id',name:'id'},
                    {data:'name',name:'name'},
                    {data:'city.city',name:'city'},
                    {data:'action',name:'action'}
                    ]
        });
        $('#create').on('click',function(){
            $('#add-form').trigger('reset');
            $('#Model').modal('show');
            $('#id').val('');
            $('#modelHeading').html('Add');
            $('option:selected').prop("selected",false);
        });


        $('body').on('click','.edit',function(){
            var id = $(this).data('id');
            console.log(id);
            $('#Model').modal('show');
            $('#modelHeading').html('Edit');
            $.get('/demo/edit/'+id,function(data){
               $('#id').val(data.id);
                $('#name').val(data.name);
                 $('#Model').find('select[name="city"] option[value="' + data.city + '"]').attr('selected', true);
                //$.val(data.city);
            })
        });

        $('body').on('click','.delete',function(){
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                type:'get',
                url:'/demo/delete/'+id,
                success:function(data){
                     $('.data-table').DataTable().ajax.reload();
                }
            });
        });
        $('#save-data').click(function(e){
            e.preventDefault();
            $.ajax({
                data:$('#add-form').serialize(),
                url:'/demo/insert',
                datatype:'json',
                type:'POST',
                success:function(data){
                    $('#Model').modal('hide');
                    $('#add-form').trigger('reset');
                    $('.data-table').DataTable().ajax.reload();
                }
            });
        });
    });
</script>
@endsection