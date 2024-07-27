<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    use HasFactory;

    public function prod_cat()
    {
    return $this->belongsToMany(Product::class, 'product_prodcat');
    }

    public function subcategories()
    {
        return $this->hasMany(ProductSubcategories::class);
    }
}
