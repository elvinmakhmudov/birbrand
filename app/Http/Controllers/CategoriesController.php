<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Banner;
use BirBrand\Carousel;
use BirBrand\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Get all categories
     */
    public function index()
    {
        // $categories = Cache::remember('categories', config('cache.lifetime'), function () {
            // return Category::isShown()->with('children')->get();
        // });

        $carousels= Cache::remember('carousels', config('cache.lifetime'), function () {
            return Carousel::isShown()->get();
        });

        $banners = Cache::remember('banners', config('cache.lifetime'), function () {
            return Banner::isShown()->get();
        });

        $cart = ['cartItems' => Cart::content(), 'cartTotal' => Cart::total()];

        return ['carousels' => $carousels, 'banners' => $banners, 'cart' => $cart];
    }


    /**
     * Show products of the category
     */
    public function show($slug, Request $request)
    {
        $this->validate($request, [
            'sortBy'=>'in:rating,created_at',
            'inOrder' => 'in:asc,desc'
        ]);

        $category = Cache::remember('category/'.$slug,  config('cache.lifetime'), function () use($slug) {
            return Category::where('slug', $slug)->isShown()->with('products', 'children')->first();
        });

        $sortBy= $request->get('sortBy');

        $productsPage = Cache::remember('productsPage/'.$slug.'/'.$request->get('page').'/'.$sortBy, config('cache.lifetime'), function () use($category, $request, $sortBy) {
            if ($sortBy) {
                return $category->products()->orderBy($request->get('sortBy'), $request->get('inOrder'))->paginate(16);
            } else {
                return $category->products()->paginate(16);
            }
        });

        return ['category' => $category, 'productsPage' => $productsPage];
    }
}
