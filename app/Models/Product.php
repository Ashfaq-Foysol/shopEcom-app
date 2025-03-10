<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    private static $product, $image, $imageName, $directory, $imageUrl;
    protected $fillable = ['name','description','selling_price','image','status'];
    public static function getImageUrl($request)
    {
       self::$image = $request->file('image');
       self::$imageName = self::$image->getClientOriginalName();
       self::$directory = 'upload/product-images/';
       self::$image->move(self::$directory, self::$imageName);
       self::$imageUrl=self::$directory.self::$imageName;
       return self::$imageUrl;

    }

   public static function newProduct($request)
   {
       self::$product = new Product();
       self::$product->category_id = $request->category_id;
       self::$product->name        = $request->name;
       self::$product->description = $request->description;
       self::$product->selling_price = $request->selling_price;
       self::$product->image       = self::getImageUrl($request);
       self::$product->status        =$request->status;
       self::$product->save();

   }
   public static function updateProduct($request,$id)
   {
       self::$product = Product::find($id);
       if ($request->file('image'))
       {
           if(file_exists(self::$product->image))
           {
               unlink(self::$product->image);

           }
           self::$imageUrl = self::getImageUrl($request);

       }
       else
       {
           self::$imageUrl = self::$product->image;
       }
       self::$product->category_id = $request->category_id;
       self::$product->name        = $request->name;
       self::$product->description = $request->description;
       self::$product->selling_price = $request->selling_price;

       self::$product->image       =  self::$imageUrl;
       self::$product->status        =$request->status;
       self::$product->save();


   }
   public static function deleteProduct($id)
   {
       self::$product = Product::find($id);

           if(file_exists(self::$product->image))
           {
               unlink(self::$product->image);

           }
           self::$product->delete();
       }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
