<?php

namespace App\Http\Controllers;

// use Carbon\Unit;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        return view('admin.unit.index');
    }

    public function create(Request $request)
    {

        // return $request->file('image');
        Unit::newUnit($request);

        return back()->with('message', 'unit info created successfully');
    }
    public function manage(){
        return view('admin.unit.manage',['units'=>Unit::all()]);
    }
    public function edit($id){
        return view('admin.unit.edit',['unit'=>Unit::find($id)]);
    }
    public function Update(Request $request, $id){
        Unit::updateUnit($request, $id);
        return redirect('/unit/manage')->with('message', 'unit info updated successfully');


    }
    public function delete($id){
        Unit::deleteUnit($id);
        return redirect('/unit/manage')->with('message', 'unit info deleted successfully');
    }
}

