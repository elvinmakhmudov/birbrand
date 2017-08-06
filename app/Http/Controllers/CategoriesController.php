<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Category;

class CategoriesController extends Controller
{
    /**
     * Get all categories
     */
    public function index()
    {
        return Category::with('descendants')->get();
    }


    /**
     * Show products of the category
     */
    public function show($slug) {
        $category = Category::where('slug', $slug)->with('products')->first();

        return $category;
    }
}
