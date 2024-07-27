<?php

namespace App\Http\Controllers;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Banner;
use App\Models\ProductCategories;
use App\Models\ProductSubcategories;
use App\Models\ProductAttribute;
use App\Models\Trustedpartners;
use App\Models\Webuser;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Query to get aggregated data
        $checkoutData = Checkout::selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d') as date, COUNT(*) as aggregate")
            ->whereDate('created_at', '>=', now()->subDays(30)) // Get data for the last 30 days
            ->groupBy('date')
            ->get();
        // Prepare data for Chart.js. Then check if data is empty and set default values
        $labels = $checkoutData->isEmpty() ? [] : $checkoutData->pluck('date');
        $data = $checkoutData->isEmpty() ? [] : $checkoutData->pluck('aggregate');
        $checkout = Checkout::count();
        $product = Product::count();
        $banner = Banner::count();
        $cat = ProductCategories::count();
        $subcat = ProductSubcategories::count();
        $attr = ProductAttribute::count();
        $trusted = Trustedpartners::count();
        $webuser = Webuser::count();
        $user = User::count();
        return view('dashboard', compact('labels', 'data','checkout','product','banner','cat','subcat','attr','trusted','webuser','user'));
    }
}
