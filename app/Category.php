<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\CustomField\Lib\Mixins\HasFields;

class Category extends Model
{
    use HasFields;

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class)
            ->with('subsubcategories')
            ->withCount('subsubcategories');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function classified_products()
    {
        return $this->hasMany(CustomerProduct::class);
    }

    public function subsubcategories()
    {
        return $this->hasManyThrough(SubSubCategory::class, SubCategory::class);
    }
}
