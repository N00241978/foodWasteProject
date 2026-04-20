<?php

namespace App\Http\Controllers;

use App\Models\SurplusListing;
use Illuminate\Http\Request;

class SurplusListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the search input
        $search = $request->input('search');

        // Fetch all surplus listings from the database
        if ($search) {
            $surplus_listings = SurplusListing::where('name', 'like', "%{$search}%") // Finds by name
                ->get();
        } else {
            $surplus_listings = SurplusListing::get();  // Finds only the surplus listings
        }


        // Send the surplus listings to the index view
        return view('surplus-listing.index', compact('surplus_listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surplus-listing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'discounted_price' => 'required',
            'quantity_available' => 'required',
            'pickup_start' => 'required',
            'pickup_end' => 'required',
            'status' => 'required',
        ]);

        // Create a new surplus listing record in the database
        SurplusListing::create([
            'title' => $request->title,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'discounted_price' => $request->discounted_price,
            'quantity_available' => $request->quantity_available,
            'pickup_start' => $request->pickup_start,
            'pickup_end' => $request->pickup_end,
            'status' => $request->status,

        ]);

        // Redirect to the index page with a success message
        return to_route('surplus-listing.index')->with('success', 'Surplus listing created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SurplusListing $surplus_listing)
    {
        return view('surplus-listing.show', compact('surplus_listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurplusListing $surplus_listing)
    {
        return view('surplus-listing.edit', compact('surplus_listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SurplusListing $surplus_listing)
    {
        // Validate input
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'discounted_price' => 'required',
            'quantity_available' => 'required',
            'pickup_start' => 'required',
            'pickup_end' => 'required',
            'status' => 'required',
        ]);

        // Update the surplus listing in the database
        $surplus_listing->update([
            'title' => $request->title,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'discounted_price' => $request->discounted_price,
            'quantity_available' => $request->quantity_available,
            'pickup_start' => $request->pickup_start,
            'pickup_end' => $request->pickup_end,
            'status' => $request->status,
        ]);

        // Redirect to the index page with a success message
        return to_route('surplus-listing.index')->with('success', 'Surplus listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurplusListing $surplus_listing)
    {
        SurplusListing::where('id', $surplus_listing->id)->delete();

        return to_route('surplus-listing.index')->with('success', 'Surplus listing was deleted successfully!');
    }
}
