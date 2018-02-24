<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Banner;
use BirBrand\Carousel;
use BirBrand\Category;
use BirBrand\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

        $carousels = Cache::remember('carousels', config('cache.lifetime'), function () {
            return Carousel::isShown()->get();
        });

        $products = Cache::remember('products', config('cache.lifetime'), function () {
            return Product::isShown()->limit(24)->get();
        });

        $banners = Cache::remember('banners', config('cache.lifetime'), function () {
            return Banner::isShown()->get();
        });

        $cart = ['cartItems' => Cart::content(), 'cartTotal' => Cart::total()];

        return ['carousels' => $carousels, 'banners' => $banners, 'cart' => $cart, 'products' => $products];
    }

    /**
     * Show products of the category
     */
    public function show($slug, Request $request)
    {
        $this->validate($request, [
            'sortBy' => 'in:rating,created_at,price,ordered,trending',
            'inOrder' => 'in:asc,desc',
            'page' => 'integer'
        ]);

        $category = Cache::remember('category/' . $slug, config('cache.lifetime'), function () use ($slug) {
            return Category::where('slug', $slug)->isShown()->with('products', 'children')->first();
        });

        $sortBy = $request->get('sortBy') ?: 'created_at';
        $inOrder = $request->get('inOrder') ?: 'desc';
        $page = $request->get('page') ?: 1;


        $productsPage = Cache::remember('productsPage/' . $slug . '/' . $page . '/' . $sortBy . '/' . $inOrder, config('cache.lifetime'), function () use ($category, $request, $sortBy, $inOrder) {
            // Get ids of descendants
            $categories = $category->descendants()->pluck('id');

            // Include the id of category itself
            $categories[] = $category->getKey();
            if ($sortBy) {
                return Product::whereIn('category_id', $categories)->orderBy($sortBy, $inOrder)->paginate(24);
            } else {
                return Product::whereIn('category_id', $categories)->paginate(24);
            }
        });

        return ['category' => $category, 'productsPage' => $productsPage];
    }
}
