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

class CategoriesRepository
{
    use ValidatesRequests;

    public function index()
    {
        $categories = Category::with(['user', 'parent'])->paginate(15);
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();

        return view('admin.categories.edit')->with(['category' => $category, 'categories' => $categories]);
    }

    public function update($id, $request)
    {
        //Validate the request
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|file',
            'parent' => 'nullable|exists:categories,id',
        ]);

        //update the category
        $category = Category::findOrFail($id);

        //if delete was clicked, delete the product
        if (!empty($request->get('delete'))) {
            Storage::deleteDirectory($category->folder);
            $category->delete();
            Cache::flush();
            return redirect()->route('admin.categories.index');
        }

        $parentCategorySlug = Category::find($request->get('parent')) ?Category::find($request->get('parent'))->slug : "";
        $category->title = $request->get('title');
        $tmpCategorySlug = str_replace("general", "", $request->get('title'));

        $category->slug = str_slug($parentCategorySlug . $tmpCategorySlug, '.');
        $category->description = $request->get('description');
        //if image exists, update it
        if ($request->file('image')) {
            Storage::delete($category->image_url);
            $storage_path = $category->folder. '/' . Str::random(40) . '.jpg';
            Image::make($request->file('image'))->fit(200)->save(storage_path('app/public/') . $storage_path);
            $category->image_url = $storage_path;
        }
        $category->parent_id = $request->get('parent');

        //is category shown?
        $category->is_shown = $request->get('is_shown') ? true : false;

        $category->save();
        //flush the cache because the item has been updated
        Cache::flush();
        return redirect()->route('admin.categories.index');
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        //Validate the request
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|file',
            'parent' => 'nullable|exists:categories,id',
        ]);

        //create a category
        $category = new Category;
        $category->title = $request->get('title');
        $category->description = $request->get('description');

        //create a folder for images
        $folder = str_random(20);
        $path = 'categories/' . $folder;
        Storage::makeDirectory($path);
        $category->folder = $path;

        //is category shown?
        $category->is_shown = $request->get('is_shown') ? true : false;

        if($request->file('image')){
            $storage_path = $path . '/' . Str::random(40) . '.jpg';
            Image::make($request->file('image'))->fit(200)->save(storage_path('app/public/') . $storage_path);
            $category->image_url = $storage_path;
        }
        $category->parent_id = $request->get('parent');
        $parentCategorySlug = Category::find($request->get('parent')) ?Category::find($request->get('parent'))->slug : "";
        //remove string general to make more user friendly url
        $tmpCategorySlug = str_replace("general", "", $request->get('title'));
        $category->slug = str_slug($parentCategorySlug . $tmpCategorySlug, '.');
        $category->user()->associate(Auth::user());
        $category->save();
        //flush the cache because the item has been updated
        Cache::flush();
        return redirect()->route('admin.categories.index');
    }
}
