<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return view('warehouse.index');


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'manager_name' => 'nullable|string|max:255',
            // 'capacity' => 'nullable|integer',
        ]);

        Warehouse::create([
            'name' => $request->name,
            'location' => $request->location,
            'manager_name' => $request->manager_name,
            // 'capacity' => $request->capacity,
        ]);
        // dd($request->all());

        return redirect()->route('warehouse.index')
            ->with('success', 'Warehouse created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $warehouse = Warehouse::findOrFail($id);
        return view('warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'manager_name' => 'nullable|string|max:255',
            // 'capacity' => 'nullable|integer',
        ]);

        $warehouse = Warehouse::findOrFail($id);
        $warehouse->update([
            'name' => $request->name,
            'location' => $request->location,
            'manager_name' => $request->manager_name,
            // 'capacity' => $request->capacity,
        ]);

        return redirect()->route('warehouse.index')
            ->with('success', 'Warehouse updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Delete a warehouse.
     */
    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();

        return redirect()->back()->with('success', 'Warehouse deleted successfully!');
    }
}
