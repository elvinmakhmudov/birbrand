<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Banner;
use BirBrand\Carousel;
use BirBrand\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

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

        $cart = ['cartItems' =>Cart::content(), 'cartTotal' => Cart::total() ];

        return ['categories' => $categories, 'carousels' => $carousels, 'banners' => $banners, 'cart' => $cart ];
    }


    /**
     * Show products of the category
     */
    public function show($slug) {
        $category = Category::where('slug', $slug)->isShown()->with('products', 'children')->first();

        return $category;
    }
}
