<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    private static $brand, $image, $imageName, $directory, $imageUrl;
     protected $fillable = ['name','description','image','status'];
     public static function getImageUrl($request)
     {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/brand-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;

     }

    public static function newBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name        = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image       = self::getImageUrl($request);
        self::$brand->status        =$request->status;
        self::$brand->save();

    }
    public static function updateBrand($request,$id)
    {
        self::$brand = Brand::find($id);
        if ($request->file('image'))
        {
            if(file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);

            }
            self::$imageUrl = self::getImageUrl($request);

        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }
        self::$brand->name        = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image       =  self::$imageUrl;
        self::$brand->status        =$request->status;
        self::$brand->save();


    }
    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);

            if(file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);

            }
            self::$brand->delete();
        }
}
