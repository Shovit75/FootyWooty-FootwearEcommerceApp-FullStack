<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSubcategories;
use App\Models\ProductCategories;
use App\Models\Product;
use Storage;

class ProductSubcategoriesController extends Controller
{
    public function index(){
        $prodsubcat = ProductSubcategories::paginate(4);
        $prodcat = ProductCategories::all();
        return view('productsubcat.index',compact('prodsubcat','prodcat'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'product_categories_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $prodsubcat = new ProductSubcategories;
        $prodsubcat -> name = $request['name'];
        $prodsubcat -> product_categories_id = $request['product_categories_id'];
        $imagepath = $request['image']->store('prodsubcat','public');
        $prodsubcat -> image = $imagepath;
        $prodsubcat -> save();
        return redirect('/productsubcat');
    }

    public function edit($id){
        $prodsubcat = ProductSubcategories::find($id);
        $prodcat = ProductCategories::all();
        return view('productsubcat.edit',compact('prodsubcat','prodcat'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'product_categories_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $prodsubcat = ProductSubcategories::find($id);
        $prodsubcat -> name = $request['name'];
        $prodsubcat -> product_categories_id = $request['product_categories_id'];
        if($request['image'])
        {
            if($prodsubcat->image){
                Storage::disk('public')->delete($prodsubcat->image); // Delete the old image
            }
            $imagepath = $request['image']->store('prodsubcat','public');
            $prodsubcat -> image = $imagepath;
        }
        $prodsubcat -> save();
        return redirect('/productsubcat');
    }

    public function delete($id){
        $prodsubcat = ProductSubcategories::find($id);
        if($prodsubcat->image){
            Storage::disk('public')->delete($prodsubcat->image); // Delete the old image
        }
        $prodsubcat->delete();
        return redirect('/productsubcat');
    }

    public function prodsubcatshow($id){
        $product = ProductSubcategories::find($id);
        $prodsubcat = ProductSubcategories::all();
        $prodcat = ProductCategories::all();
        $products = $product->prod_subcat;
        return view('productsubcat.prodcatshow', compact('products','prodsubcat','prodcat'));
    }
}
