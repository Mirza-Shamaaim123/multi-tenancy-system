<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
        return view('frontend.index');
    }

    public function product()
    {
        return view('frontend.product-list');
    }
    public function addproduct()
    {
        return view('frontend.add-product');
    }
    public function expiredproduct()
    {
        return view('frontend.expired-product');
    }
    public function stock(){
        return view('frontend.stock-list');
    }
    public function manager(){
        return view('frontend.manger.dashboard');
    }
    public function saleman(){
        return view('frontend.saleman.dashboard');
    }
    public function category(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.category-list', compact('categories'));
    }
    public function brand(){
          $brands = Brand::latest()->get();
        return view('frontend.brand-list', compact('brands'));
    }
    public function unit(){
         $units = Unit::all(); // ya paginate() bhi use kar sakte ho
        return view('frontend.unit-list', compact('units'));
    }
    public function subcategory(){
        $categories = Category::where('status', 'Active')->get();
        $subcategories = SubCategory::with('category')->get();

        return view('frontend.sub-category-list', compact('categories', 'subcategories'));
    }
}


