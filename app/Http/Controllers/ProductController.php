<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;


class ProductController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $products=Product::get();
        return view('product_view',compact('products'));
    }
    public function create(){

        return view('product_insert');
    }
    public function insert(Request $request){
        $product=new Product;
        $product->product_id=$request->input('product_id');
        $product->product_name=$request->input('product_name');
        $product->product_desc=$request->input('product_desc');
        $product->category=$request->input('category');
        $product->save();
        return redirect()->route('display');
    }
    public function edit($id){
        $product=Product::find($id);
        return view('product_edit',compact('product'));
    }

     public function update(Request $request,$id){
        $product=Product::find($id);
        $product->product_id=$request->input('product_id');
        $product->product_name=$request->input('product_name');
        $product->product_desc=$request->input('product_desc');
        $product->category=$request->input('category');
        $product->update();
         return redirect()->route('display');
    }
    public function delete(Request $request,$id){
        $product=Product::where('id',$id)->delete($id);
         return redirect()->route('display');
    }
    public function roles()
    {
        $users=User::with('permissions')->get();
        return view('users',compact('users'));
    }
}
