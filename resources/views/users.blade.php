@extends('index')
@section('content')
<body>
    <div class="container">
             {{$dataTable->table()}}
    <div class="container">
  {{-- data --}}
  {{ $dataTable->scripts() }}
</body>
@endsection