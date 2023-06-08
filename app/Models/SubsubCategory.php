<?php

namespace App\Models;

use App\Http\Controllers\SubsubcategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubsubCategory extends Model
{
    use HasFactory;
    private static $subsubCategory ,$image ,$imageName , $imageExtension,$imageURL ,$directory;

    public  static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$directory = 'subsub-category-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;
        return self::$imageURL;

    }

    public static function newSubsubCategory($request)
    {
        self::$subsubCategory = new SubsubCategory();
        self::$subsubCategory->category_id   = $request->category_id;
        self::$subsubCategory->subcategory_id = $request->subcategory_id;
        self::$subsubCategory->name           = $request->name;
        self::$subsubCategory->description    = $request->description;
        self::$subsubCategory->image          = self::getImageUrl($request);
        self::$subsubCategory->save();

    }

    public static function updateSubsubCategory($request , $id)
    {
        self::$subsubCategory = SubsubCategory::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$subsubCategory->image))
            {
                unlink(self::$subsubCategory->image);
            }
            self::$imageURL = self::getImageUrl($request);
        }
        else
        {
            self::$imageURL = self::$subsubCategory->image;
        }
        self::$subsubCategory->category_id = $request->category_id;
        self::$subsubCategory->subcategory_id = $request->subcategory_id;
        self::$subsubCategory->name = $request->name;
        self::$subsubCategory->description = $request->description;
        self::$subsubCategory->image = self::$imageURL;
        self::$subsubCategory->save();
    }
    public  static function deleteSubsubCategory($id)
    {
        self::$subsubCategory = SubsubCategory::find($id);
        if(file_exists(self::$subsubCategory->image))
        {
            unlink(self::$subsubCategory->image);
        }
        self::$subsubCategory->delete();
    }
    public function  subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
