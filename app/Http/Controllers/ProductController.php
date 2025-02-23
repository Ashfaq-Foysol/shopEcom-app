<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index',['categories'=>Category::all()]);

    }

    public function create(Request $request)
    {

        // return $request->file('image');
        Product::newProduct($request);

        return back()->with('message', 'Productinfo created successfully');
    }
    public function manage(){
        return view('admin.product.manage',['products'=>Product::all()]);
    }
    public function edit($id){
        return view('admin.product.edit',[
            'categories'=>Category::all(),
            'product'=>Product::find( $id ),]);
    }
    public function Update(Request $request, $id){
        Product::updateProduct($request, $id);
        return redirect('/product/manage')->with('message', 'Product info updated successfully');


    }
    public function delete($id){
        Product::deleteProduct($id);
        return redirect('/product/manage')->with('message', 'Productinfo deleted successfully');
    }
}
