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
            $business = Business::where('role', 'business')    // Finds by name
                ->where('name', 'like', "%{$search}%")
                ->get();
        } else {
            $business = Business::where('role', 'business')->get();  // Finds only the businesses
        }


        // Send the businesses to the index view
        return view('businesses.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business.create');
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
            'email' => 'required',
            'description' => 'required',
            'opening_hours' => 'required',
        ]);

        // Create a new business record in the database
        Business::create([
            'business_name' => $request->name,
            'business_type' => $request->type,
            'address' => $request->address,
            'city' => $request->city,
            'eircode' => $request->eircode,
            'email' => $request->email,
            'description' => $request->description,
            'opening_hours' => $request->opening_hours,

        ]);

        // Redirect to the index page with a success message
        return to_route('business.index')->with('success', 'Business created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        $users = $business->users;
        $surplusListing = $business->surplusListing;
        $review = $business->review;
        return view('businesses.show', compact(
            'users',
            'business',
            'surplusListing',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
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
            'email' => 'required',
            'description' => 'required',
            'opening_hours' => 'required',
        ]);

        // Create a record in the database
        $business->update([
            'business_name' => $request->name,
            'business_type' => $request->type,
            'address' => $request->address,
            'city' => $request->city,
            'eircode' => $request->eircode,
            'email' => $request->email,
            'description' => $request->description,
            'opening_hours' => $request->opening_hours,
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
