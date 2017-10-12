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

    public function edit($productId)
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
            'imagesToDelete' => 'nullable',
            'images' => 'nullable|array',
            'options' => 'nullable|json',
            'category' => 'nullable|exists:categories,id'
        ]);


        //update the category
        $product = Product::findOrFail($productId);

        //if delete was clicked, delete the product
        if (!empty($request->get('delete'))){
            Storage::deleteDirectory($product->folder);
            $product->delete();
            return redirect()->route('admin.products.index', ['id' => $categoryId]);
        }


        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->old_price = $request->get('old_price');
        $product->sale_percent = $request->get('sale_percent');
        $product->price = $request->get('price');
        $product->options = $request->get('options');

        //if image exists, update it
        if ($request->file('thumbnail')) {
            Storage::delete($product->thumbnail);
            $product->thumbnail = $request->file('thumbnail') ? $request->file('thumbnail')->store($product->folder) : '';
        }

        //delete images if required
        $images = $request->get('imagesToDelete');
        if ($images) {
            Storage::delete($images);
            $product->images = array_diff($product->images, $images);
        }

        //save additional images
        $product->images = array_merge($product->images, $this->saveImages($request, $product->folder));

        $product->category_id = $request->get('category');

        //is product shown?
        $product->is_shown = $request->get('is_shown') ? true : false;

        $product->save();
        return redirect()->route('admin.products.index', ['id' => $categoryId]);
    }

    public function create($categoryId)
    {
        $categories = Category::all();

        return view('admin.products.create')->with(['categories' => $categories, 'categoryId' => $categoryId]);
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
            'images' => 'nullable|array',
            'options' => 'nullable|json',
            'category' => 'nullable|exists:categories,id'
        ]);

        $product = new Product;
        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->price = $request->get('price');

        //create a folder for images
        $folder = str_random(20);
        $path = 'products/' . $folder;
        Storage::makeDirectory($path);
        $product->folder = $path;

        //save additional images
        $product->images = $this->saveImages($request, $path);

        $product->thumbnail = $request->file('thumbnail') ? $request->file('thumbnail')->store($path) : '';
        $product->category_id = $request->get('category');
        $product->user_id = Auth::user()->id;
        $product->save();
        return redirect()->route('admin.products.index', ['id' => $categoryId]);
    }

    public function saveImages(Request $request, $path)
    {
        $images = [];
        $requestImages = $request->file('images');
        if ($requestImages) {
            foreach ($requestImages as $image) {
                $imageUrl = $image->store($path);
                array_push($images, $imageUrl);
            }
        }
        return $images;
    }

}
