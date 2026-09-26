<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Listing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;

class ListingController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::orderBy('id', 'DESC')->paginate(10);

        return Inertia::render(
            'frontend/listing/index',
            [
                'listings' => $listings,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('frontend/listing/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'beds' => 'required|numeric',
            'baths' => 'required|numeric',
            'area' => 'required|numeric',
            'price' => 'required|numeric',
            'city' => 'required',
            'street' => 'required',
            'street_no' => 'required',
            'code' => 'required',
        ]);

        Listing::create($validated);

        return redirect()->route('frontend.listing.index')->with('success', 'Listing created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return Inertia::render(
            'frontend/listing/show',
            [
                'listing' => $listing,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return Inertia::render(
            'frontend/listing/edit',
            [
                'listing' => $listing,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $validated = $request->validate([
            'beds' => 'required|numeric',
            'baths' => 'required|numeric',
            'area' => 'required|numeric',
            'price' => 'required|numeric',
            'city' => 'required',
            'street' => 'required',
            'street_no' => 'required',
            'code' => 'required',
        ]);

        $listing->update($validated);

        return redirect()->route('frontend.listing.index')->with('success', 'Listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->route('frontend.listing.index')->with('success', 'Listing deleted successfully!');
    }
}
