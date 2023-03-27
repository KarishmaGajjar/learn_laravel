<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Yajra\DataTables\DataTables;


class ProductController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if ($request->ajax()) {
            $product = Product::get();
            return Datatables::of($product)
                    ->addIndexColumn()
                    ->addColumn('action', function($product){
                        $btn='';
                        if(auth()->user()->can('product edit')){
                           $btn .= '<a href="'.route('products.edit',$product->id).'" class="btn btn-icon btn-secondary"><i class="bx bx-edit-alt me-2"></i></a>
                        ';
                        }
                        if(auth()->user()->can('product delete')){
                        $btn.='<a href="'.route('products.delete',$product->id).'" class="btn btn-icon btn-danger"><i class="bx bx-trash me-2"></i></a>';
                        //$btn = '<a href="{{$product->id}}" class="btn btn-icon btn-secondary"><i class="bx bx-edit-alt me-2"></i></a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
        return view('product_view');
    }
    public function create(){
        if(auth()->user()->can('product add')){
        return view('product_insert');
        }
        else{
            return view('layouts.blank');
        }
    }
    public function insert(Request $request){
        if(auth()->user()->can('product add')){
        $validate=$request->validate([
            'product_id'=>'required|unique:products',
            'product_name'=>'required',
            'product_desc'=>'required',
            'category'=>'required'
        ],[
            'product_name.required'=>"Please enter product name",
            'product_id.required'=>"Please Enter Product Id",
            'product_id.unique'=>"Product Id should be unique",
            'product_desc.required'=>"Please Enter Product Description",
            'category.required'=>"Please Enter Category"


        ]);
            $product=new Product;
            $product->product_id=$request->input('product_id');
            $product->product_name=$request->input('product_name');
            $product->product_desc=$request->input('product_desc');
            $product->category=$request->input('category');
            $product->save();
            return redirect()->route('products.index');
        }
        else{
            return view('layouts.blank');
        }


    }
        public function edit($id){
            if(auth()->user()->can('product edit')){
             $product=Product::find($id);
            return view('product_edit',compact('product'));
            }
            else{
                return view('layouts.blank');
            }
        }

     public function update(Request $request,$id){
       if(auth()->user()->can('product edit')){

        $product=Product::find($id);
        $product->product_id=$request->input('product_id');
        $product->product_name=$request->input('product_name');
        $product->product_desc=$request->input('product_desc');
        $product->category=$request->input('category');
        $product->update();
         return redirect()->route('products.index');
       }
       else{
        return view('layouts.blank');
       }
    }
    public function delete(Request $request,$id){
        if(auth()->user()->can('product edit')){
            $product=Product::where('id',$id)->delete($id);
                return redirect()->route('products.index');
        }
        else{
            return view('layouts.blank');
        }
    }
    // public function roles()
    // {
    //     $users=User::with('permissions')->get();
    //     return view('users',compact('users'));
    // }
}
