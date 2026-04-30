<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function show()
    {
        // Get user's active cart + its listings
        $cart = auth()->user()
            ->active_cart()
            ->with('surplusListings')
            ->first();

        return view('carts.show', compact('cart'));
    }


    public function remove($id)
    {
        $cart = auth()->user()->active_cart;

        if ($cart) {
            $listing = $cart->surplusListings()->find($id);

            if ($listing) {
                // Remove from cart
                $listing->update(['cart_id' => null]);

                // Optional: make it available again
                $listing->update(['status' => 'available']);
            }
        }

        return back()->with('success', 'Item removed from cart.');
    }
}