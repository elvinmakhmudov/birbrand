<?php

namespace BirBrand\Http\Controllers;
use BirBrand\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductsController extends Controller
{
    public function show($productId)
    {
        return Cache::remember('product/'.$productId,  config('cache.lifetime'), function () use($productId) {
            return Product::isShown()->with('category.ancestors')->findOrFail($productId);
        });
    }
}
