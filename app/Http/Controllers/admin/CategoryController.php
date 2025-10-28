<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->has('status') ? 'active' : 'inactive';
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $request->id,
        ]);

        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->has('status') ? 'active' : 'inactive';
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully!');
    }
    public function destroy(Request $request)
{
    $request->validate([
        'id' => 'required|exists:categories,id',
    ]);

    $category = Category::findOrFail($request->id);
    $category->delete();

    return redirect()->back()->with('success', 'Category deleted successfully!');
}

}
