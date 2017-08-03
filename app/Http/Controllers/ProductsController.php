<?php

namespace BirBrand\Http\Controllers;
use BirBrand\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show($productId)
    {
        return Product::with('category.ancestors')->findOrFail($productId);
    }
}
