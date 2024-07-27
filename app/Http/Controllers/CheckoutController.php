<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\ProductCategories;
// use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CheckoutController extends Controller
{
    public function checkout(){
        $cartItems = \Cart::getContent();
        $prodcat = ProductCategories::all();
        return view('frontend.checkout',compact('cartItems','prodcat'));
    }

    public function store(Request $request){
        // Validate the request data
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:10'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:10'],
            'order' => ['required', 'string'],
            'total' => ['required', 'numeric', 'min:0'],
        ]);
        // Create and save the Checkout instance
        $checkout = new Checkout;
        $checkout->firstname = $validatedData['firstname'];
        $checkout->lastname = $validatedData['lastname'];
        $checkout->address = $validatedData['address'];
        $checkout->city = $validatedData['city'];
        $checkout->state = $validatedData['state'];
        $checkout->zip = $validatedData['zip'];
        $checkout->email = $validatedData['email'];
        $checkout->phone = $validatedData['phone'];
        $checkout->order = $validatedData['order'];
        $checkout->total = $validatedData['total'];
        $checkout->save();
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $response = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'money',
                        ],
                        'unit_amount' => $request->total * 100,
                    ],
                    'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('stripe.success'),
                'cancel_url' => route('stripe.cancel'),
        ]);
        return redirect()->away($response->url);
    }

    public function checkoutb(){
        $checkouts = Checkout::all();
        return view('checkouts.index',compact('checkouts')); //compact left
    }

    public function edit($id){
        $checkout = Checkout::find($id);
        return view('checkouts.edit',compact('checkout'));
    }

    public function update(Request $request, $id){
        $checkout = Checkout::find($id);
        $checkout -> firstname = $request['firstname'];
        $checkout -> lastname = $request['lastname'];
        $checkout -> address = $request['address'];
        $checkout -> city = $request['city'];
        $checkout -> state = $request['state'];
        $checkout -> zip = $request['zip'];
        $checkout -> email = $request['email'];
        $checkout -> phone = $request['phone'];
        $checkout -> order = json_encode($request['order']);
        $checkout -> total = $request['total'];
        $checkout -> save();
        return redirect('checkoutb');
    }

    public function delete($id){
        $checkout = Checkout::find($id);
        $checkout->delete();
        return redirect('checkoutb');
    }
}
