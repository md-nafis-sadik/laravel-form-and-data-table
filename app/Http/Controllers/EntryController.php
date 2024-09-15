<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        // Fetch all entries from the database
        $entries = Entry::all();
        // Return the view with the entries data
        return view('entries.index', compact('entries'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        // Return the view for creating a new entry
        return view('entries.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new entry in the database
        Entry::create($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('entries.index')->with('success', 'Entry created successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit(Entry $entry)
    {
        // Return the view for editing the entry with the entry data
        return view('entries.edit', compact('entry'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Entry $entry)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update the entry in the database
        $entry->update($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('entries.index')->with('success', 'Entry updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Entry $entry)
    {
        // Delete the entry from the database
        $entry->delete();

        // Redirect to the index page with a success message
        return redirect()->route('entries.index')->with('success', 'Entry deleted successfully.');
    }
}
