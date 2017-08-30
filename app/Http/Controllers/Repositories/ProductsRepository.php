<?php

namespace BirBrand\Http\Controllers\Repositories;

use BirBrand\Category;
use BirBrand\Order;
use BirBrand\Product;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsRepository
{
    use ValidatesRequests;
    public function index($id, Request $request)
    {
        $category = Category::findOrFail($id);

        $products = $category->products;

        return view('admin.products.index')->with(['category' => $category, 'products' => $products]);
    }

    public function edit($id, $productId)
    {
        $product = Product::findOrFail($productId);

        $categories = Category::all();

        $category = $product->category;

        return view('admin.products.edit')->with(['product' => $product, 'categories' => $categories, 'category' => $category]);
    }

    public function update($categoryId, $productId, $request)
    {
        //Validate the request
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|file',
            'old_price' => 'nullable|integer',
            'sale_percent' => 'nullable|integer',
            'price' => 'required|integer',
            'images' => 'nullable|file',
            'options' => 'nullable|json',
            'category' => 'nullable|exists:categories,id'
        ]);

        //update the category
        $product = Product::findOrFail($productId);
        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->price= $request->get('price');

        //if image exists, update it
        if ($request->get('thumbnail')) {
            Storage::delete($product->thumbnail);
            $product->thumbnail = $request->file('thumbnail') ? $request->file('thumbnail')->store($product->folder) : '';
        }

        $product->category_id = $request->get('category');
        $product->save();
        return redirect()->route('admin.products.index', ['id' => $categoryId]);
    }

    public function create($categoryId)
    {
        $categories =Category::all();

        return view('admin.products.create')->with(['categories' => $categories, 'categoryId' =>$categoryId]);
    }

    public function store($categoryId, Request $request)
    {
        //Validate the request
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|file',
            'old_price' => 'nullable|integer',
            'sale_percent' => 'nullable|integer',
            'price' => 'required|integer',
            'image1' => 'nullable|file',
            'image2' => 'nullable|file',
            'image3' => 'nullable|file',
            'image4' => 'nullable|file',
            'image5' => 'nullable|file',
            'options' => 'nullable|json',
            'category' => 'nullable|exists:categories,id'
        ]);

        $product = new Product;
        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->price= $request->get('price');

        //create a folder for images
        $folder = str_random(20);
        $path = 'products/' . $folder;
        Storage::makeDirectory($path);
        $product->folder = $path;

        //save additional images
        $product->images = $this->saveImages($request,$path);


        $product->thumbnail = $request->file('thumbnail') ? $request->file('thumbnail')->store($path) : '';
        $product->category_id = $request->get('category');
        $product->user_id = Auth::user()->id;
        $product->save();
        return redirect()->route('admin.products.index', ['id' => $categoryId]);
    }

    public function saveImages(Request $request, $path)
    {
        $images = [];
        for($i =1;$i<6;$i++) {
            $image = $request->file('image' . $i);
            // if image exists save and add to array
            if($image){
                $imageUrl = $image->store($path);
                array_push($images, $imageUrl);
            }
        }
        return $images;
    }

}
