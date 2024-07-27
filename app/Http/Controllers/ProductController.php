<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductCategories;
use App\Models\ProductSubcategories;
use App\Models\ProductAttribute;
use Storage;

class ProductController extends Controller
{
    public function index(){
        $prodcat = ProductCategories::all();
        $products = Product::paginate(4);
        $prodsubcat = ProductSubcategories::all();
        $prodattr = ProductAttribute::all();
        return view('products.index',compact('products','prodcat','prodsubcat','prodattr'));
    }

    public function store(Request $request){
        $products = new Product;
        $products -> name = $request['name'];
        $products -> price = $request['price'];
        $products -> description = $request['description'];
        $products -> quantity = $request['quantity'];
        $products -> status = $request['status'];
        $imagepath = $request['image']->store('products','public');
        $products -> image = $imagepath;
        $products -> color = json_encode($request['color']);
        $products -> size = json_encode($request['size']);
        $products -> save();
        $categories = $request['categories']; // Assuming 'categories' is an array of category IDs
        $subcategories = $request['subcategories']; // Assuming 'subcategories' is an array of category IDs
        $products ->prod_cat()->sync($categories);
        $products ->prod_subcat()->sync($subcategories);
        return redirect('product');
    }

    public function edit($id){
        $products = Product::find($id);
        $prodcat = ProductCategories::all();
        $prodsubcat = ProductSubcategories::all();
        $prodattr = ProductAttribute::all();
        return view('products.edit',compact('products','prodcat','prodsubcat','prodattr'));
    }

    public function update(Request $request, $id){
        $products = Product::find($id);
        $products -> name = $request['name'];
        $products -> price = $request['price'];
        $products -> description = $request['description'];
        $products -> quantity = $request['quantity'];
        $products -> status = $request['status'];
        if($request['image']){
            if ($products->image) {
                Storage::disk('public')->delete($products->image); // Delete the old image
            }
            $imagepath = $request['image']->store('products','public');
            $products -> image = $imagepath;   
        }
        $products -> color = json_encode($request['color']);
        $products -> size = json_encode($request['size']);
        $products -> save();
        $categories = $request['categories']; // Assuming 'categories' is an array of category IDs
        $subcategories = $request['subcategories']; // Assuming 'subcategories' is an array of category IDs
        $products ->prod_cat()->sync($categories);
        $products ->prod_subcat()->sync($subcategories);
        return redirect('product');
    }

    public function delete($id){
        $products = Product::find($id);
        if ($products->image) {
            Storage::disk('public')->delete($products->image); // Delete the old image
        }
        $products->delete();
        return redirect('product');
    }

    public function changeStatus($id, $status) {
        $products = Product::find($id);
        $products -> status = $status;
        $products -> save();
        return response()->json(['success'=>'Status change successful']);
    }
}
