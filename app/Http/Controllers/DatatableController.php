<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo;
use Yajra\DataTables\DataTables;
class DatatableController extends Controller
{
    public function index(Request $request){
         $data=Demo::get();
        if($request->ajax()){
              $data=Demo::get();
              return DataTables::of($data)->addIndexColumn()->addColumn('extra',function($data){
                return $data->city;
              })->addColumn('another',function($data){
                return "";
              })->make(true);
            }
             return view('datatable');
        }
}

