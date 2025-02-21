<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;
    private static $otherimage, $image, $imageName, $directory, $imageUrl;
    // protected $fillable = ['name','long_description','image','status'];
    public static function getImageUrl($image)
    {
       self::$imageName = $image->getClientOriginalName();
       self::$directory = 'upload/product-other-images/';
       self::$image->move(self::$directory, self::$imageName);
       self::$imageUrl=self::$directory.self::$imageName;
       return self::$imageUrl;

    }
    public static function newOtherImage($images,$id)
    {
        foreach($images as $images )
        {
            self::$otherimage = new OtherImage();
            self::$otherimage->product_id = $id;
            // self::$image->image = $self::getImageUrl($image);


        }

    }

}
