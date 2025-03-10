<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public static function updateCategory($request,$id)
    {
        self::$categoroy = Category::find($id);
        if ($request->file('image'))
        {
            if(file_exists(self::$categoroy->image))
            {
                unlink(self::$categoroy->image);

            }
            self::$imageUrl = self::getImageUrl($request);

        }
        else
        {
            self::$imageUrl = self::$categoroy->image;
        }
        self::$categoroy->name        = $request->name;
        self::$categoroy->description = $request->description;
        self::$categoroy->image       =  self::$imageUrl;
        self::$categoroy->status        =$request->status;
        self::$categoroy->save();


    }
    public static function deleteCategory($id)
    {
        self::$categoroy = Category::find($id);

            if(file_exists(self::$categoroy->image))
            {
                unlink(self::$categoroy->image);

            }
            self::$categoroy->delete();
        }
        public function subCategories()
        {
            return $this->hasMany(SubCategory::class);

        }




}
