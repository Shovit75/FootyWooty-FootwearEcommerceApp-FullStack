<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubcategories extends Model
{
    use HasFactory;

    public function prod_subcat()
    {
    return $this->belongsToMany(Product::class, 'product_prodsubcat','product_subcategories_id','product_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategories::class);
    }
}
