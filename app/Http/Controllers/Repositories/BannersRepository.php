<?php

namespace BirBrand\Http\Controllers\Repositories;

use BirBrand\Banner;
use BirBrand\Carousel;
use BirBrand\Category;
use BirBrand\Order;
use BirBrand\Product;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class BannersRepository
{
    use ValidatesRequests;

    public function index()
    {
        $banners = Banner::with('user')->get();
        return view('admin.banners.index')->with('banners', $banners);
    }

    public function edit($id)
    {
        $banner= Banner::findOrFail($id);

        return view('admin.banners.edit')->with('banner', $banner);
    }

    public function update($id, $request)
    {
        //Validate the request
        $this->validate($request, [
            'description' => 'nullable|string',
            'image' => 'nullable|file',
            'url' => 'nullable|string',
            'type' => 'nullable|string',
        ]);

        //update the category
        $banner = Banner::findOrFail($id);

        //if delete was clicked, delete the product
        if (!empty($request->get('delete'))) {
            Storage::delete($banner->image_url);
            $banner->delete();
            return redirect()->route('admin.banners.index');
        }

        $banner->description = $request->get('description');
        $banner->url = $request->get('url');

        //if image exists, update it
        if ($request->file('image')) {
            Storage::delete($banner->image_url);
            $banner->image_url = $request->file('image') ? $request->file('image')->store('banners') : '';
        }

        //if type exists, change it
        if ($request->get('type')) {
            $banner->type = $request->get('type');
        }

        $banner->user_id = Auth::user()->id;

        //is  banner shown?
        $banner->is_shown = $request->get('is_shown') ? true : false;

        $banner->save();

        //flush the cache because the item has been updated
        Cache::flush();

        return redirect()->route('admin.banners.index');
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        //Validate the request
        $this->validate($request, [
            'description' => 'nullable|string',
            'image' => 'required|file',
            'url' => 'required|string',
            'type' => 'required|string',
        ]);

        //store the banner
        $banner = new Banner();

        $banner->description = $request->get('description');

        //if image exists, update it
        $banner->image_url = $request->file('image') ? $request->file('image')->store('banners') : '';

        $banner->user_id = Auth::user()->id;

        //is  banner shown?
        $banner->is_shown = $request->get('is_shown') ? true : false;
        $banner->type = $request->get('type');
        $banner->url = $request->get('url');

        $banner->save();

        //flush the cache because the item has been updated
        Cache::flush();

        return redirect()->route('admin.banners.index');
    }
}
