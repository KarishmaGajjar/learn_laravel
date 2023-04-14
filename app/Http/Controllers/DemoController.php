<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo;
use App\Models\City;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Gate;

class DemoController extends Controller
{

    public function index(Request $request){
        $cities=City::get();
        $user=User::find(7);
         $roles=auth()->user()->getRoleNames();

        if($request->ajax()){
        $data=Demo::with('city')->get();
            // return DataTables::of($data)
            //         ->addIndexColumn()
            //         ->addColumn('action',function($data){
            //             $btn='';
            //             $btn.='<a href="javascript:void(0)" class="btn btn-icon btn-secondary edit" data-id="'.$data->id.'"><i class="bx bx-edit-alt me-2"></i></a>';
            //           //  if(auth()->user()->can('delete_')){
            //              $btn.='<a href="javascript:void(0)" class="btn btn-icon btn-danger delete" data-id="'.$data->id.'"><i class="bx bx-trash-alt me-2"></i></a>';
            //            // }
            //             return $btn;
            //         })
            //         ->rawColumns(['action'])
            //         ->make(true);
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($data){
                    $btn='';
                    $btn.='<a href="javascript:void(0)" class="btn btn-icon btn-secondary edit" data-id="'.$data->id.'"><i class="bx bx-edit-alt me-2"></i></a>';
                    return $btn;
                })->rawColumns(['action'])->make(true);
            }
        return view('layouts.demo',compact('cities'));
        // $pluck=collect(config('setting_fields'))->pluck('elements')->flatten(1);
        // dd($pluck);
        // $links=collect([
        //         "instagram"=>"instagram_link",
        //         "facebook"=>"",
        //         "twitter"=>"twiter_link"
        //         ])
        //        ->reject(function($val){
        //             return $val=='';
        //        })->map(fn ($link,$net) =>'<a href="'.$link.'">'.$net.'</a>' )->implode('|');
        //         dd($links);
    }


    public function insert(Request $request){
        if(!Gate::allows('admin')){
         return redirect('error');
     }
     else{
         Demo::updateOrCreate(['id'=>$request->id],['name'=>$request->name,'city'=>$request->city]);
         return response()->json(["success"=>"dojnee"]);
     }
    }

    public function edit(Request $request,$id){
        $data=Demo::find($id);
        return response()->json($data);
    }

    public function delete(Request $request,$id){
        $data=Demo::where('id',$id)->delete($id);
        return response()->json();
    }


}
