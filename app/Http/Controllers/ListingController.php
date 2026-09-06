<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ListingController extends Controller
{
    use AuthorizesRequests;

    // =========================
    // Show all listings
    // =========================
    public function index()
    {
        $listings = Listing::with('user')->latest()->get();

        return view('listings.index', compact('listings'));
    }


    // =========================
    // Show create form
    // =========================
    public function create()
    {
        return view('listings.create');
    }


    // =========================
    // Store new listing
    // =========================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'seller_phone' => 'required|string|max:20',
            'image' => 'nullable|image|max:2048',
        ]);

        // Add logged-in user ID
        $validated['user_id'] = auth()->id();

        // Upload image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('listings', 'public');
        }

        Listing::create($validated);

        return redirect()
            ->route('listings.index')
            ->with('success', 'Listing created successfully!');
    }


    // =========================
    // Show single listing
    // =========================
    public function show(Listing $listing)
    {
        $listing->load('user');

        return view('listings.show', compact('listing'));
    }


    // =========================
    // Show edit form
    // =========================
    public function edit(Listing $listing)
{
    $this->authorize('update', $listing);

    return view('listings.edit', compact('listing'));
}


    // =========================
    // Update listing
    // =========================
    public function update(Request $request, Listing $listing)
    {
        // Only owner can update
        $this->authorize('update', $listing);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'seller_phone' => 'required|string|max:20',
            'image' => 'nullable|image|max:2048',
        ]);

        // Upload new image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('listings', 'public');
        }

        $listing->update($validated);

        return redirect()
            ->route('listings.show', $listing)
            ->with('success', 'Listing updated successfully!');
    }


    // =========================
    // Delete listing
    // =========================
    public function destroy(Listing $listing)
    {
        // Only owner can delete
        $this->authorize('delete', $listing);

        $listing->delete();

        return redirect()
            ->route('listings.index')
            ->with('success', 'Listing deleted successfully!');
    }
}