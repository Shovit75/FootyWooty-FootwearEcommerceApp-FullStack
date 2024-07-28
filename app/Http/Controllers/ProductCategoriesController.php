<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Models\Product;
use Storage;

class ProductCategoriesController extends Controller
{
    public function index(){
        $prodcat = ProductCategories::paginate(4);
        return view('productcat.index',compact('prodcat'));
    }

    public function store(Request $request){
        $request->validate([
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
            ]);
        $prodcat = new ProductCategories;
        $prodcat -> name = $request['name'];
        $imagepath = $request['image']->store('prodcat','public');
        $prodcat -> image = $imagepath;
        $prodcat -> save();
        return redirect('/productcat');
    }

    public function edit($id){
        $prodcat = ProductCategories::find($id);
        return view('productcat.edit',compact('prodcat'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $prodcat = ProductCategories::find($id);
        $prodcat -> name = $request['name'];
        if($request['image'])
        {
            if($prodcat->image){
                Storage::disk('public')->delete($prodcat->image); // Delete the old image
            }
            $imagepath = $request['image']->store('prodcat','public');
            $prodcat -> image = $imagepath;
        }
        $prodcat -> save();
        return redirect('/productcat');
    }

    public function delete($id){
        $prodcat = ProductCategories::find($id);
        if($prodcat->image){
            Storage::disk('public')->delete($prodcat->image); // Delete the old image
        }
        $prodcat->delete();
        return redirect('/productcat');
    }

    public function prodcatshow($id){
        $product = ProductCategories::find($id);
        $prodcat = ProductCategories::all();
        $products = $product->prod_cat;
        return view('productcat.prodcatshow', compact('products','prodcat'));
    }
}
