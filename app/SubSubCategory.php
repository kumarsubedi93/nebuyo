<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\CustomField\Lib\Mixins\HasFields;

class SubSubCategory extends Model
{
    use HasFields;

  public function subcategory(){
  	return $this->belongsTo(SubCategory::class, 'sub_category_id');
  }

  public function products(){
  	return $this->hasMany(Product::class, 'subsubcategory_id');
  }

  public function classified_products(){
  	return $this->hasMany(CustomerProduct::class, 'subsubcategory_id');
  }
}
