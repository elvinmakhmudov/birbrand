<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Http\Controllers\Repositories\ProductsRepository;
use BirBrand\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProductsController extends Controller
{
    public function __construct(ProductsRepository $repository)
    {
        $this->products = $repository;
    }

    public function show($productId)
    {
        return Cache::remember('product/' . $productId, config('cache.lifetime'), function () use ($productId) {
            return Product::isShown()->with('category.ancestors')->findOrFail($productId);
        });
    }

    public function rate(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'orderId' => 'required|integer',
                'productId' => 'required|integer',
                'rate' => 'required|in:like,dislike',
            ]);
            return $this->products->rate($request);
        }
        return ['errors' => ['flashMessage.messages.error']];
    }
}
