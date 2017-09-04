<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Banner;
use BirBrand\Carousel;
use BirBrand\Category;

class CategoriesController extends Controller
{
    /**
     * Get all categories
     */
    public function index()
    {
        $categories = Category::isShown()->with('children')->get();

        $carousels = Carousel::isShown()->get();

        $banners = Banner::isShown()->get();

        return ['categories' => $categories, 'carousels' => $carousels, 'banners' => $banners];
    }


    /**
     * Show products of the category
     */
    public function show($slug) {
        $category = Category::where('slug', $slug)->isShown()->with('products', 'children')->first();

        return $category;
    }
}
