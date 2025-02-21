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
    private $product;
    public function index(){
        return view('admin.product.index',[
            'categories'=> Category::all(),
            'sub_categories'=> SubCategory::all(),
            'brands'=> Brand::all(),
            'units'=> Unit::all(),

        ]);
    }

    public function create(Request $request)
    {

        // return $request->file('image');
        $this->product = Product::newProduct($request);
        // OtherImage::newOtherImage($request->other_image, $this->product->id);
        return back()->with('message', 'product info created successfully');
    }
    public function manage(){
        return view('admin.product.manage',['products'=>Product::all()]);
    }
    public function edit($id){
        return view('admin.product.edit',['product'=>Product::find($id)]);
    }
    public function Update(Request $request, $id){
        Product::updateProduct($request, $id);
        return redirect('/product/manage')->with('message', 'product info updated successfully');


    }
    public function delete($id){
        Product::deleteProduct($id);
        return redirect('/product/manage')->with('message', 'product info deleted successfully');
    }
}
