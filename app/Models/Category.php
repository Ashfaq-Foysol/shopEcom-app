<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $categoroy, $image, $imageName, $directory, $imageUrl;
     protected $fillable = ['name','description','image','status'];
     public static function getImageUrl($request)
     {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;

     }

    public static function newCategory($request)
    {
        self::$categoroy = new Category();
        self::$categoroy->name        = $request->name;
        self::$categoroy->description = $request->description;
        self::$categoroy->image       = self::getImageUrl($request);
        self::$categoroy->status        =$request->status;
        self::$categoroy->save();

    }

}
