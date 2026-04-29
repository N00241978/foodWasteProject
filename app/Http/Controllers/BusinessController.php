<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the search input
        $search = $request->input('search');

        // Fetch all business from the database
        if ($search) {
            $businesses = Business::where('name', 'like', "%{$search}%") // Finds by name
                ->get();
        } else {
            $businesses = Business::get();  // Finds only the businesses
        }


        // Send the businesses to the index view
        return view('businesses.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Business::all();

        return view('businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'business_name' => 'required',
            'business_type' => 'required',
            'address' => 'required',
            'city' => 'required',
            'eircode' => 'required',
            'email' => 'nullable|email',
            'description' => 'required',
            'opening_hours' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('businesses', 'public');
        }

        // Create a new business record in the database
        Business::create([
            'business_name' => $request->business_name,
            'business_type' => $request->business_type,
            'address' => $request->address,
            'city' => $request->city,
            'eircode' => $request->eircode,
            'email' => $request->email,
            'description' => $request->description,
            'opening_hours' => $request->opening_hours,
            'image' => $imagePath,

        ]);

        // Redirect to the index page with a success message
        return to_route('businesses.index')->with('success', 'Business created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        $users = $business->users;
        $surplus_listing = $business->surplus_listing;
        $review = $business->review;

        $business->surplus_listings;

        return view('businesses.show', compact(
            'users',
            'business',
            'surplus_listing',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        $businesses = Business::all();

        return view('businesses.edit')->with('business', $business);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $business)
    {
        // Validate input
        $request->validate([
            'business_name' => 'required',
            'business_type' => 'required',
            'address' => 'required',
            'city' => 'required',
            'eircode' => 'required',
            'email' => 'nullable|email',
            'description' => 'required',
            'opening_hours' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $business->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('businesses', 'public');
        }

        // Create a record in the database
        $business->update([
            'business_name' => $request->business_name,
            'business_type' => $request->business_type,
            'address' => $request->address,
            'city' => $request->city,
            'eircode' => $request->eircode,
            'email' => $request->email,
            'description' => $request->description,
            'opening_hours' => $request->opening_hours,
            'image' => $imagePath,
        ]);

        // Redirect to the index page with a success message
        return to_route('businesses.index')->with('success', 'Business updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        Business::where('id', $business->id)->delete();

        return to_route('businesses.index')->with('success', 'Business was deleted successfully!');
    }
}
