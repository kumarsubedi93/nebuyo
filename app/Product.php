<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\CustomField\Lib\Mixins\HasFieldValues;

class Product extends Model
{
    use HasFieldValues;

    protected $fillable = [
        'name','added_by', 'user_id', 'category_id', 'subcategory_id', 'subsubcategory_id', 'brand_id', 'video_provider', 'video_link', 'unit_price',
        'purchase_price', 'unit', 'slug', 'colors', 'choice_options', 'variations', 'current_stock', 'short_description'
      ];
    public function category(){
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory(){
    	return $this->belongsTo(SubCategory::class);
    }

    public function subsubcategory(){
    	return $this->belongsTo(SubSubCategory::class);
    }

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function orderDetails(){
    return $this->hasMany(OrderDetail::class);
    }

    public function reviews(){
    return $this->hasMany(Review::class)->where('status', 1);
    }

    public function wishlists(){
    return $this->hasMany(Wishlist::class);
    }

    public function stocks(){
    return $this->hasMany(ProductStock::class);
    }

    public function homeCategory()
    {
        return $this->belongsTo(HomeCategory::class, 'category_id');
    }
}
