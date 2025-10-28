<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    //
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'nullable|string|max:10',
        ]);

        $unit = new Unit(); // ← ensure full path
        $unit->name = $request->name;
        $unit->short_name = $request->short_name;
        $unit->status = $request->has('status') ? 'active' : 'inactive';
        $unit->save();


        return redirect()->back()->with('success', 'Unit added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'nullable|string|max:10',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->name = $request->name;
        $unit->short_name = $request->short_name;
        $unit->status = $request->has('status') ? 'active' : 'inactive';
        $unit->save();

        return redirect()->back()->with('success', 'Unit updated successfully!');
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->back()->with('success', 'Unit deleted successfully!');
    }
}
