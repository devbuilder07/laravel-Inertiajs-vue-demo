<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\{HasMiddleware, Middleware};
use Inertia\Inertia;

class ListingController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::orderBy('created_at', 'DESC')->get();

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
    public function show(string $id)
    {
        $listing = Listing::find($id);

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
    public function edit(string $id)
    {
        $listing = Listing::find($id);

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
    public function update(Request $request, string $id)
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

        Listing::where('id', $id)->update($validated);

        return redirect()->route('frontend.listing.index')->with('success', 'Listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Listing::where('id', $id)->delete();

        return redirect()->route('frontend.listing.index')->with('success', 'Listing deleted successfully!');
    }
}
