<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Status;
use App\Models\Demo;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
      public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        $categories=Category::get();
        $statuses=Status::get();
        $category=Category::with('product')->get();
               //$product=Product::with('category:id,name')->get();
        if ($request->ajax()) {
            // dd($request->status);
                   $product=Product::with('category','status')->get();
                   if(empty($request->get('status'))&&$request->get('status')=='0'){
                    $product=Product::with('category','status')->get();
                   }
                   else{
                        $product=Product::with('category','status')->where('status',$request->get('status'))->get();
                   }
                  return Datatables::of($product)
                    ->addColumn('action', function($product){
                        $btn='';
                        if(auth()->user()->can('product edit')){
                           $btn .= '<a href="javascript:void(0)" class="btn btn-icon btn-secondary edit-product" id="edit-product" data-id="'.$product->id.'"><i class="bx bx-edit-alt me-2"></i></a>
                        ';
                        }
                        if(auth()->user()->can('product delete')){
                        // <a href="'.route('products.delete',$product->id).'
                        $btn.='<a href="javascript:void(0)" class="btn btn-icon btn-danger product-delete" data-id="'.$product->id.'"><i class="bx bx-trash me-2 delete-product"></i></a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          return view('product_view',compact('categories','statuses'));
    }
    public function create(){
        if(auth()->user()->can('product add')){
            $categories=Category::get();
            return response()->json($categories);
        }
        else{
            return view('layouts.blank');
        }
    }
    public function insert(Request $request){
        if(auth()->user()->can('product add')){
        $validate=$request->validate([
            'product_name'=>'required',
            'product_desc'=>'required',
            'category'=>'required',
            'status'=>'required'
         ],[
            'product_name.required'=>"Please enter product name",
            'product_desc.required'=>"Please Enter Product Description",
            'category.required'=>"Please Enter Category",
            'status.required'=>"Please select status",
        ]);
            // $product=new Product;
            // $product->product_name=$request->input('product_name');
            // $product->product_desc=$request->input('product_desc');
            // $product->category=$request->input('category');
            // $product->status=$request->input('status');
            // $product->save();
            //return redirect()->route('products.index');
             Product::updateOrCreate(['id' => $request->id],
                                     ['product_name' => $request->product_name,
                                      'product_desc' => $request->product_desc,
                                      'category' => $request->category,
                                       'status'=>$request->status
                                     ]);

         return response()->json(['success'=>'Product saved successfully.']);
        }
        else{
            return view('layouts.blank');
        }
    }
    public function edit($id){
        if(auth()->user()->can('product edit')){
         $categories=Category::get();
         $product=Product::find($id);
          return response()->json($product);
        }
        else{
            return view('layouts.blank');
        }
    }

    public function status(Request $reques,$id){
         // $categories=Category::get();
         // $product=Product::with('status')->where('status',$id)->get();
         // return response()->json($product);


    }
     public function update(Request $request,$id){
       if(auth()->user()->can('product edit')){
            $product=Product::find($id);
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
            // redirect()->route('products.index');
            return response()->json();
        }
        else{
            return view('layouts.blank');
        }
    }
}

