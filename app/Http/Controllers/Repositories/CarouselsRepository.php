<?php

namespace BirBrand\Http\Controllers\Repositories;

use BirBrand\Carousel;
use BirBrand\Category;
use BirBrand\Order;
use BirBrand\Product;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarouselsRepository
{
    use ValidatesRequests;

    public function index()
    {
        $carousels = Carousel::with('user')->get();
        return view('admin.carousels.index')->with('carousels', $carousels);
    }

    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);

        return view('admin.carousels.edit')->with('carousel', $carousel);
    }

    public function update($id, $request)
    {
        //Validate the request
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|file',
            'url' => 'nullable|string',
        ]);

        //update the category
        $carousel = Carousel::findOrFail($id);

        //if delete was clicked, delete the product
        if (!empty($request->get('delete'))){
            Storage::delete($carousel->image_url);
            $carousel->delete();
            return redirect()->route('admin.carousels.index');
        }

        $carousel->title = $request->get('title');
        $carousel->description = $request->get('description');

        //if image exists, update it
        if ($request->file('image')) {
            Storage::delete($carousel->image_url);
            $carousel->image_url = $request->file('image') ? $request->file('image')->store('carousels') : '';
        }

        $carousel->user_id = Auth::user()->id;

        //is  carousel shown?
        $carousel->is_shown = $request->get('is_shown') ? true : false;

        $carousel->save();
        return redirect()->route('admin.carousels.index');
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

        $category->image_url = $request->file('image') ? $request->file('image')->store($path) : '';
        $category->parent_id = $request->get('parent');
        $category->user()->associate(Auth::user());
        $category->save();
        return redirect()->route('admin.categories.index');
    }
}
