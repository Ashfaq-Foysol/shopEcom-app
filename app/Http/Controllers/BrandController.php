<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.index');
    }

    public function create(Request $request)
    {

        // return $request->file('image');
        Brand::newBrand($request);

        return back()->with('message', 'brand info created successfully');
    }
    public function manage(){
        return view('admin.brand.manage',['brands'=>Brand::all()]);
    }
    public function edit($id){
        return view('admin.brand.edit',['brand'=>Brand::find($id)]);
    }
    public function Update(Request $request, $id){
        Brand::updateBrand($request, $id);
        return redirect('/brand/manage')->with('message', 'brand info updated successfully');


    }
    public function delete($id){
        Brand::deleteBrand($id);
        return redirect('/brand/manage')->with('message', 'brand info deleted successfully');
    }
}
