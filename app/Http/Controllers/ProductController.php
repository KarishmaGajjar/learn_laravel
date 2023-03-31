<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Yajra\DataTables\DataTables;
use Session;


class ProductController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
      $categories=Category::get();
      //  $prod=Product::select('products.*')->leftJoin('category','products.category','=','category.id')->get();
       //return $product = Product::with('category')->whereRelation('category','product.category')->get();
       //return $prod->category->name;
      if ($request->ajax()) {
            $product = Product::get();
            return Datatables::of($product)
                    ->addIndexColumn()
                    ->addColumn('action', function($product){
                        $btn='';
                        if(auth()->user()->can('product edit')){
                           $btn .= '<a href="javascript:void(0)" class="btn btn-icon btn-secondary edit-product" id="edit-product" data-id="'.$product->id.'"><i class="bx bx-edit-alt me-2"></i></a>
                        ';
                        }
                        if(auth()->user()->can('product delete')){
                        //$btn.='<a href="'.route('products.delete',$product->id).'" class="btn btn-icon btn-danger product-delete" data-id="'.$product->id.'"><i class="bx bx-trash me-2 delete-product"></i></a>';
                        $btn.='<a href="javascript:void(0)" class="btn btn-icon btn-danger product-delete" data-id="'.$product->id.'"><i class="bx bx-trash me-2 delete-product"></i></a>';
                        //$btn = '<a href="{{$product->id}}" class="btn btn-icon btn-secondary"><i class="bx bx-edit-alt me-2"></i></a>';
                        }
                        return $btn;
                    })
                    ->addColumn('status',function($product){
                            $status='';
                            $status.= '<a href="javascript:void(0)" class="btn btn-icon btn-secondary product-status" id="product-status" data-id="'.$product->id.'"><i class="bx bx-edit-alt me-2"></i></a>';
                            return $status;
                        })

                    ->rawColumns(['status','action'])
                    ->make(true);
                }
        return view('product_view')->with('categories',$categories);
    }
    public function create(){

    //    return  $product = Product::get();
        if(auth()->user()->can('product add')){
          $categories=Category::get();
        // return view('product_insert',compact('categories'));
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
            'category'=>'required'
        ],[
            'product_name.required'=>"Please enter product name",
            'product_desc.required'=>"Please Enter Product Description",
            'category.required'=>"Please Enter Category"


        ]);
            // $product=new Product;
            // $product->product_name=$request->input('product_name');
            // $product->product_desc=$request->input('product_desc');
            // $product->category=$request->input('category');
            // $product->save();
            // return redirect()->route('products.index');
             Product::updateOrCreate(['id' => $request->id],
            ['product_name' => $request->product_name, 'product_desc' => $request->product_desc,'category' => $request->category]);
            return response()->json(['success'=>'Post saved successfully.']);
            Session::flash('success', 'File has been uploaded successfully!');
            return View::make('include/flash');

        }
        else{
            return view('layouts.blank');
        }


    }
        public function edit($id){
            if(auth()->user()->can('product edit')){
             $categories=Category::get();
             $product=Product::find($id);
            // return view('product_edit',compact('product','categories'));
              return response()->json($product);
            }
            else{
                return view('layouts.blank');
            }
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
