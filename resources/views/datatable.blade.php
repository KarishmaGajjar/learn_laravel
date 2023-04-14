@extends('index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>DataTable</h4>
              <div class="card p-4">
                <div class="table-responsive text-nowrap">
                  <table class="table table-responsive" id="dataTable">
                    <thead>
                      <tr>
                           <th>Sr.no</th>
                           <th>id</th>
                           <th>Name</th>
                           <th>city</th>
                           <th>extra</th>
                           <th>another</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(function () {
            var table=$('#dataTable').DataTable({
                processing:true,
                serverSide:true,
                ajax:{url:'{{route('datatable')}}'},
                columns:[
                         {data:'DT_RowIndex',name:'sr.no'},
                         {data:'id',name:'id',searchable:false},
                         {data:'name',name:'name',searchable:true},
                         {data:'city',name:'city',searchable:false},
                         {data:'extra',name:'extra',searchable:false},
                         {data:'another',name:'another',orderable:true,searchable:false}
                        ]
        });
    });
</script>
@endsection