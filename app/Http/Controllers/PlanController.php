<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $plans = Plan::all();
        return view('plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'plan' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        Plan::create([
            'plan' => $request->plan,
            'duration' => $request->duration,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('plans.index')->with('success', 'Plan added successfully!');
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
        $plan = Plan::findOrFail($id);
        return view('plan.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'plan' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $plan = Plan::findOrFail($id);
        $plan->update([
            'plan' => $request->plan,
            'duration' => $request->duration,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('plans.index')->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find plan or throw 404 if not found
        $plan = Plan::findOrFail($id);

        // Delete the plan
        $plan->delete();

        // Redirect back to plans list with success message
        return redirect()->route('plans.index')->with('success', 'Plan deleted successfully.');
    }
}