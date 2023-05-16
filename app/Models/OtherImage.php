<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;

    public static $otherImage ,$otherImages,$image ,$imageName , $imageExtension,$imageUrl ,$directory;
    public  static function getImageUrl($image)
    {

        self::$imageExtension = $image->getClientOriginalExtension();
        self::$imageName = rand(1000000,5000000).'.'.self::$imageExtension;
        self::$directory = 'product-other-images/';
        $image->move(self::$directory,self::$imageName);
        return self::$directory.self::$imageName;

    }
    public static function newOtherImage($id,$otherImages)
    {
        foreach ($otherImages as $otherImage)
        {
            self::$otherImage =new OtherImage();
            self::$otherImage->product_id =$id;
            self::$otherImage->image = self::getImageUrl($otherImage);
            self::$otherImage->save();
        }

    }
    public static function updateOtherImage($id,$otherImages)
    {
        self::deleteOtherImage($id);
        self::newOtherImage($id,$otherImages);
    }
    public static function deleteOtherImage($id)
    {
        self::$otherImages = OtherImage::where('product_id',$id)->get();
        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image))
            {
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
    }
}
