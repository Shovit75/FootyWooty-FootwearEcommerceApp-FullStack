<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function prod_cat()
    {
    return $this->belongsToMany(ProductCategories::class, 'product_prodcat');
    }

    public function prod_subcat()
    {
    return $this->belongsToMany(ProductSubcategories::class, 'product_prodsubcat','product_id','product_subcategories_id');
    }
}
