<?php

namespace BirBrand\Http\Controllers\Repositories;

use BirBrand\Category;
use BirBrand\Order;
use BirBrand\Product;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductsRepository
{
    use ValidatesRequests;

    public function index($id, Request $request)
    {
        $category = Category::findOrFail($id);

        $products = $category->products()->with('user')->paginate(10);

        return view('admin.products.index')->with(['category' => $category, 'products' => $products]);
    }

    public function rate(Request $request) {
        $orderId = $request->get('orderId');
        $productId = $request->get('productId');

        $order = Order::findOrFail($orderId);
        $product = Product::findOrFail($productId);
        $orderProduct = $order->products()->where('product_id', $productId)->first();

        if($order->reviewable && $orderProduct->pivot->reviewable) {
            switch($request->get('rate')){
                case 'like':
                    $product->likes++;
                    break;
                case 'dislike':
                    $product->dislikes++;
                    break;
            }
            $orderProduct->pivot->reviewable = false;
            $orderProduct->pivot->save();
            $product->updateRating();
            $product->save();
            $order->reviewable= false;
            return response()->json(['messages' => ['flashMessage.messages.rate.success']], 200);
        }
        return response()->json(['errors' => ['flashMessage.messages.error']], 400);
    }

    public function edit($productId)
    {
        $product = Product::findOrFail($productId);

        $categories = Category::select('id', 'title')->get();

        $category = $product->category;

        return view('admin.products.edit')->with(['product' => $product, 'categories' => $categories, 'category' => $category]);
    }

    public function update($categoryId, $productId, $request)
    {
        //Validate the request
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|file',
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
        if ($request->file('cover_image')) {
            //remove the original image and thumbnail
            Storage::delete($product->cover_image);
            Storage::delete($product->folder.'/thumbnail.jpg');

            //save the thumbnail
            Image::make($request->file('cover_image'))->resize(300, 300)->save(storage_path('app/public/').$path.'/thumbnail.jpg');
            //save original cover image
            $product->cover_image = $request->file('cover_image') ? $request->file('cover_image')->store($product->folder) : '';

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


        //flush the cache because the item has been updated
        Cache::flush();

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
            'cover_image' => 'nullable|file',
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
        $product->options = $request->get('options');

        //create a folder for images
        $folder = str_random(20);
        $path = 'products/' . $folder;
        Storage::makeDirectory($path);
        $product->folder = $path;

        //save additional images
        $product->images = $this->saveImages($request, $path);


        //resize and save the cover image and cover_image
        $image = $request->file('cover_image');
        if($image){
            Image::make($image)->fit(200)->save(storage_path('app/public/').$path.'/thumbnail.jpg');

            //original cover image
            $storage_path = $path.'/'.Str::random(40).'.jpg';
            Image::make($image)->fit(600)->save(storage_path('app/public/').$storage_path);
            $product->cover_image = $storage_path;
//            $product->cover_image = $image ? $image->store($path) : '';
        }

        //is product shown?
        $product->is_shown = $request->get('is_shown') ? true : false;

        $product->category_id = $request->get('category');
        $product->user_id = Auth::user()->id;
        $product->save();

        //flush the cache because the item has been updated
        Cache::flush();

        return redirect()->route('admin.products.index', ['id' => $categoryId, 'page' => $request->get('page')]);
    }

    public function saveImages(Request $request, $path)
    {
        $images = [];
        $requestImages = $request->file('images');
        if ($requestImages) {
            foreach ($requestImages as $image) {
                $storage_path = $path.'/'.Str::random(40).'.jpg';
                Image::make($image)->fit(600)->save(storage_path('app/public/').$storage_path);
//                $imageUrl = $image->store($path);
                array_push($images, $storage_path);
            }
        }
        return $images;
    }

}
