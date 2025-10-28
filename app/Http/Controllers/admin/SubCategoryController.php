<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:100|unique:sub_categories,code',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload if image is provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subcategories', 'public');
        }

        // Create new SubCategory
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->code = $request->code;
        $subCategory->description = $request->description;
        $subCategory->category_id = $request->category_id;
        $subCategory->image = $imagePath;
        $subCategory->status = $request->has('status') ? 'Active' : 'Inactive';
        $subCategory->save();

        return redirect()->back()->with('success', 'SubCategory added successfully!');
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->code = $request->code;
        $subcategory->description = $request->description;
        $subcategory->status = $request->status ? 'Active' : 'Inactive';

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subcategory', 'public');
            $subcategory->image = $imagePath;
        }

        $subcategory->save();

        return redirect()->back()->with('success', 'Subcategory updated successfully!');
    }
    public function destroy($id)
{
    $subcategory = Subcategory::findOrFail($id);
    $subcategory->delete();

    return redirect()->back()->with('success', 'Subcategory deleted successfully!');
}

}
