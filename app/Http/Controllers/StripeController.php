<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;

class StripeController extends Controller
{

    public function success(Request $request){
        // return "payment successful";
        \Cart::clear();
        return redirect('frontend/index')->with('success', 'Order placed successfully! Thankyou for shopping.');
    }
    public function cancel(Request $request){
        // return "payment cancelled";
        $cartItems = \Cart::getContent();
        $prodcat = ProductCategories::all();
        return view('frontend.checkout',compact('cartItems','prodcat'));
    }
}
