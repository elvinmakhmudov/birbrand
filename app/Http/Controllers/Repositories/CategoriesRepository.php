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
        if (!empty($request->get('delete'))){
            Storage::deleteDirectory($category->folder);
            $category->delete();
            return redirect()->route('admin.categories.index');
        }

        $category->title = $request->get('title');
        $category->slug = str_slug($request->get('title'), '-');
        $category->description = $request->get('description');
        //if image exists, update it
        if ($request->file('image')) {
            Storage::delete($category->image_url);
            $category->image_url = $request->file('image') ? $request->file('image')->store($category->folder) : '';
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
        $category->slug = str_slug($request->get('title'), '-');

        //create a folder for images
        $folder = str_random(20);
        $path = 'categories/' . $folder;
        Storage::makeDirectory($path);
        $category->folder = $path;
        
        //is category shown?
        $category->is_shown = $request->get('is_shown') ? true : false;

        $category->image_url = $request->file('image') ? $request->file('image')->store($path) : '';
        $category->parent_id = $request->get('parent');
        $category->user()->associate(Auth::user());
        $category->save();
        //flush the cache because the item has been updated
        Cache::flush();
        return redirect()->route('admin.categories.index');
    }
}
