<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $product ,$image ,$imageName , $imageExtension,$imageURL ,$directory;
    public  static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(1000000,5000000).'.'.self::$imageExtension;
        self::$directory = 'product-images/';
        self::$image->move(self::$directory,self::$imageName);
        return self::$directory.self::$imageName;

    }
    public static function newProduct($request)
    {
        self::$product = new Product();
       return  self::saveBasicInfo(self::$product,$request,self::getImageUrl($request));

    }

    public static function updateProduct($request , $id)
    {
        self::$product = Product::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageURL = self::getImageUrl($request);
        }
        else
        {
            self::$imageURL = self::$product->image;
        }
        self::saveBasicInfo(self::$product,$request,self::$imageURL);
//        self::$product->name = $request->name;
//        self::$product->description = $request->description;
//        self::$product->image = self::$imageUrl;
//        self::$product->save();



    }
    public static function saveBasicInfo($product,$request,$imageURL)
    {
        $product->category_id       = $request->category_id;
        $product->sub_category_id   = $request->sub_category_id;
        $product->brand_id          = $request->brand_id;
        $product->unit_id           = $request->unit_id;
        $product->name              = $request->name;
        $product->code              = $request->code ;
        $product->slug              = $request->slug;
        $product->regular_price     = $request->regular_price;
        $product->selling_price     = $request->selling_price;
        $product->stock_amount      = $request->stock_amount;
        $product->short_description = $request->short_description;
        $product->long_description  = $request->long_description;
        $product->image             = $imageURL;
        $product->save();
        return $product;
    }


    public  static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if(file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function otherImages()
    {
        return $this->hasMany(OtherImage::class);
    }

}
