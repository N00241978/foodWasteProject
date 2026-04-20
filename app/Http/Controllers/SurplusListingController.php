<?php

namespace App\Http\Controllers;

use App\Models\SurplusListing;
use Illuminate\Http\Request;

class SurplusListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($request)
    {
        // Get the search input
        $search = $request->input('search');

        // Fetch all surplus listings from the database
        if ($search) {
            $surplusListings = SurplusListing::where('name', 'like', "%{$search}%") // Finds by name
                ->get();
        } else {
            $surplusListings = SurplusListing::get();  // Finds only the surplus listings
        }


        // Send the surplus listings to the index view
        return view('surplus.index', compact('surplusListings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surplusListing.create');
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
        return to_route('surplusListing.index')->with('success', 'Surplus listing created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SurplusListing $surplusListing)
    {
        return view('surplusListing.show', compact('surplusListing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurplusListing $surplusListing)
    {
        return view('surplusListing.edit', compact('surplusListing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SurplusListing $surplusListing)
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
        $surplusListing->update([
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
        return to_route('surplusListing.index')->with('success', 'Surplus listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurplusListing $surplusListing)
    {
        SurplusListing::where('id', $surplusListing->id)->delete();

        return to_route('surplusListing.index')->with('success', 'Surplus listing was deleted successfully!');
    }
}
