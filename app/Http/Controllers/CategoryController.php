<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function create(Request $request)
    {

        // return $request->file('image');
        Category::newCategory($request);

        return back()->with('message', 'Category info created successfully');
    }
    public function manage(){
        return view('admin.category.manage',['categories'=>Category::all()]);
    }
}
