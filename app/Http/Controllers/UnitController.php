<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    //
    private $unit,$units;
    public function index()
    {
        return view('admin.unit.index');
    }
    public function create(Request $request)
    {
        Unit::newUnit($request);
        return back()->with('message','Unit info create successfully');
    }
    public function manage()
    {
        $this->units = Unit::all();
        return view('admin.unit.manage',['units'=>$this->units]);
    }
    public function edit($id)
    {
        $this->unit = Unit::find($id);
        return view('admin.unit.edit',['unit'=>$this->unit]);
    }
    public function update(Request $request , $id)
    {
        Unit::updateUnit($request,$id);
        return redirect('/unit/manage')->with('message','unit info update successfully.');

    }
    public function delete($id)
    {
        Unit::deleteUnit($id);
        return back()->with('message','unit info delete successfully');
    }

}
