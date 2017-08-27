<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function getCategoriesIndex()
    {
        $categories = Category::with(['user', 'parent'])->get();
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function getCategoriesEdit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();

        return view('admin.categories.edit')->with(['category' => $category, 'categories' => $categories]);
    }

    public function postCategoriesUpdate($id, Request $request)
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
        $category->title = $request->get('title');
        $category->slug = str_slug($request->get('title'), '-');
        $category->description = $request->get('description');
        $category->image_url = $request->file('image') ? $request->file('image')->store('categories') : '';
        $category->parent_id = $request->get('parent');
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function getCategoriesCreate()
    {
        $categories = Category::all();

        return view('admin.categories.create')->with('categories', $categories);
    }

    public function postCategoriesStore(Request $request)
    {
        //Validate the request
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|file',
            'parent' => 'nullable|exists:categories,id',
        ]);

        //create the category
        Category::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'slug' => str_slug($request->get('title'), '-'),
            'image_url' => $request->file('image') ? $request->file('image')->store('categories') : '',
            'parent_id' => $request->get('parent'),
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('admin.categories.index');
    }
}
