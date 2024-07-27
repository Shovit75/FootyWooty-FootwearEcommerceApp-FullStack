<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Models\Product;
use App\Models\Trustedpartners;
use App\Models\Banner;
use App\Models\ProductSubcategories;
use App\Models\Webuser;
use Hash;
use Auth;
use Session;

class FrontendController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        $prodcat = ProductCategories::all();
        $products = Product::where('status', 1)->get(); //The status is for Best Sellers
        $trusted = Trustedpartners::all();
        return view('frontend.index',compact('prodcat','products','trusted','banner'));
    }

    public function about(){
        $prodcat = ProductCategories::all();
        return view('frontend.about', compact('prodcat'));
    }

    public function productdetail($id){
        $products = Product::find($id);
        $prodcat = ProductCategories::all();
        return view('frontend.productdetail',compact('products','prodcat'));
    }

    public function showallproducts(){
        $products = Product::paginate(9);
        $prodcat = ProductCategories::all();
        $prodsubcat = ProductSubcategories::all();
        return view('frontend.showallproducts',compact('products','prodcat','prodsubcat'));
    }

    public function showcat($name){

        // $category = Category::where('name', $category)->first();
        $category = ProductCategories::where('name', $name)->first();
        $prodcat = ProductCategories::all();
        $products = $category->prod_cat()->where('status', 1)->paginate(9);
        $prodsubcat = ProductSubcategories::where('product_categories_id', $category->id)->get();
        // Pass the posts and category to the view
        return view('frontend.showcat', compact('products', 'category','prodcat','prodsubcat'));
    }

    public function showsubcat($name){
        // $category = Category::where('name', $category)->first();
        $subcategory = ProductSubcategories::where('name', $name)->first();
        // // Retrieve the products of the selected category
        $prodcat = ProductCategories::all();
        // $products = $category ? $category->products : collect();
        $prodsubcat = ProductSubcategories::all();
        $products = $subcategory->prod_subcat()->where('status', 1)->paginate(9);
        // Pass the posts and category to the view
        return view('frontend.showsubcat', compact('products', 'subcategory','prodcat','prodsubcat'));
    }

    public function login(){
        $prodcat = ProductCategories::all();
        return view('frontend.auth.login', compact('prodcat'));
    }

    public function signin(Request $request){
        $name = $request['name'];
        $password = $request['password'];
        if (Auth::guard('webuser')->attempt(['name' => $name, 'password' => $password])) {
            return redirect()->route('frontend.index');
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
        }
    }

    public function register(){
        $prodcat = ProductCategories::all();
        return view('frontend.auth.register', compact('prodcat'));
    }

    public function signup(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:webusers,name'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $webuser = new Webuser;
        $webuser -> name = $request['name'];
        $webuser -> password = Hash::make($request['password']);
        $webuser -> save();
        return redirect()->route('frontend.login');
    }

    public function logout(){
        \Cart::clear();
        Auth::guard('webuser')->logout();
        return redirect()->route('frontend.index');
    }

    //Sorting and Filtering for Categories of Products using AJAX

    public function filtersize(Request $request)
    {
        $size = $request->input('size');
        $category = $request->input('category');
        // Perform a query to filter products by size
        $filteredProducts = Product::whereJsonContains('size', $size)
        ->whereHas('prod_cat', function ($query) use ($category) {
            $query->where('name', $category);
        })
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function filtercolor(Request $request)
    {
        $color = $request->input('color');
        $category = $request->input('category');
        // Perform a query to filter products by size
        $filteredProducts = Product::whereJsonContains('Color', $color)
        ->whereHas('prod_cat', function ($query) use ($category) {
            $query->where('name', $category);
        })
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function sortasc(Request $request){
        $category = $request->input('category');
        // Perform a query to filter products by size
        $filteredProducts = Product::orderBy('price','asc')
        ->whereHas('prod_cat', function ($query) use ($category) {
            $query->where('name', $category);
        })
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function sortdesc(Request $request){
        $category = $request->input('category');
        // Perform a query to filter products by size
        $filteredProducts = Product::orderBy('price','desc')
        ->whereHas('prod_cat', function ($query) use ($category) {
            $query->where('name', $category);
        })
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function sortlatest(Request $request){
        $category = $request->input('category');
        // Perform a query to filter products by size
        $filteredProducts = Product::orderBy('created_at', 'desc')
        ->whereHas('prod_cat', function ($query) use ($category) {
            $query->where('name', $category);
        })
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    //Sorting and Filtering for Sub-Categories of Products with AJAX

    public function subfiltersize(Request $request)
    {
        $size = $request->input('size');
        $subcategory = $request->input('subcategory');
        // Perform a query to filter products by size
        $filteredProducts = Product::whereJsonContains('size', $size)
        ->whereHas('prod_subcat', function ($query) use ($subcategory) {
            $query->where('name', $subcategory);
        })
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function subfiltercolor(Request $request)
    {
        $color = $request->input('color');
        $subcategory = $request->input('subcategory');
        // Perform a query to filter products by size
        $filteredProducts = Product::whereJsonContains('Color', $color)
        ->whereHas('prod_subcat', function ($query) use ($subcategory) {
            $query->where('name', $subcategory);
        })
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function subsortasc(Request $request){
        $subcategory = $request->input('subcategory');
        // Perform a query to filter products by size
        $filteredProducts = Product::orderBy('price','asc')
        ->whereHas('prod_subcat', function ($query) use ($subcategory) {
            $query->where('name', $subcategory);
        })
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function subsortdesc(Request $request){
        $subcategory = $request->input('subcategory');
        // Perform a query to filter products by size
        $filteredProducts = Product::orderBy('price','desc')
        ->whereHas('prod_subcat', function ($query) use ($subcategory) {
            $query->where('name', $subcategory);
        })
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function subsortlatest(Request $request){
        $subcategory = $request->input('subcategory');
        // Perform a query to filter products by size
        $filteredProducts = Product::orderBy('created_at', 'desc')
        ->whereHas('prod_subcat', function ($query) use ($subcategory) {
            $query->where('name', $subcategory);
        })
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    //For all Products Page Ajax Requests and Response

    public function allsortasc(Request $request){
        // Perform a query to filter products by size
        $filteredProducts = Product::orderBy('price','asc')
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function allsortdesc(Request $request){
        // Perform a query to filter products by size
        $filteredProducts = Product::orderBy('price','desc')
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function allsortlatest(Request $request){
        // Perform a query to filter products by size
        $filteredProducts = Product::orderBy('created_at','desc')
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function allfiltersize(Request $request)
    {
        $size = $request->input('size');
        // Perform a query to filter products by size
        $filteredProducts = Product::whereJsonContains('size', $size)
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

    public function allfiltercolor(Request $request)
    {
        $color = $request->input('color');
        // Perform a query to filter products by size
        $filteredProducts = Product::whereJsonContains('color', $color)
        ->where('status', 1)
        ->paginate(9);
        // Return the filtered products as HTML (You may need to create a Blade partial for product listings)
        return view('partials.product-list', compact('filteredProducts'));
    }

}
