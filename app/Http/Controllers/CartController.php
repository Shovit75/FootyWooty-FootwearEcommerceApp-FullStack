<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        $prodcat = ProductCategories::all();
        return view('frontend.cart', compact('cartItems','prodcat'));
    }

    public function addToCart(Request $request)
    {
    \Cart::add([
        'id' => $request->id,
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'attributes' => array(
            'image' => $request->image,
        )
    ]);
    // Calculate the updated cart count
    $cartCount = \Cart::getTotalQuantity();
    // Return the updated cart count as a JSON response
    return response()->json(['cartCount' => $cartCount]);
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        $itemId = $request->input('id');
        $newQuantity = $request->input('quantity');
        $cartCount = \Cart::getTotalQuantity();
        $totalamt = \Cart::getTotal();
        // Update the item's quantity in the cart (you need to implement this logic)
        return response()->json(['message' => 'Item quantity updated successfully',
                'cartCount' => $cartCount,
                'totalamt' => $totalamt,
                ]);
    }

    public function removeCart(Request $request)
    {
        $itemId = $request->input('id');
        \Cart::remove($itemId);
        $cartCount = \Cart::getTotalQuantity();
        $totalamt = \Cart::getTotal();
        $response = [
            'message' => 'Item removed successfully',
            'cartCount' => $cartCount,
            'totalamt' => $totalamt,
            // You can include any additional data here if needed
        ];
        return response()->json($response); // Send the response as JSON
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->route('cart.list');
    }
}
