<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubsubCategory;
use Illuminate\Http\Request;

class SubsubcategoryController extends Controller
{
    private $categories,$subCategories,$subsubCategory,$subsubCategories;
    public function index()
    {
        $this->categories = Category::all();
        $this->subCategories = SubCategory::all();
        return view('admin.sub-subcategory.index',['categories'=> $this->categories, 'subCategories'=>  $this->subCategories]);
    }
    public function create(Request $request)
    {
        SubsubCategory::newSubsubCategory($request);
        return back()->with('message','Sub Sub-category info create successfully');
    }
    public function manage()
    {
        $this->subsubCategories = SubsubCategory::all();

        return view('admin.sub-subcategory.manage',['subsubCategories'=>$this->subsubCategories]);
    }
    public function edit($id)
    {
        $this->subsubCategory = SubsubCategory::find($id);

        $this->subCategories  = SubCategory::all();
        $this->categories = Category::all();
        return view('admin.sub-subcategory.edit',['subsubCategory'=>$this->subsubCategory,'subCategories'=> $this->subCategories,'categories'=>$this->categories]);

    }
    public function update(Request $request,$id)
    {

       SubsubCategory::updateSubsubCategory($request,$id);

        return redirect('/sub-subcategory/manage')->with('message','Sub sub-category info update successfully.');

    }
    public function delete($id)
    {
       SubsubCategory::deleteSubsubCategory($id);
        return back()->with('message','sub subcategory info update successfully.');
    }

}
