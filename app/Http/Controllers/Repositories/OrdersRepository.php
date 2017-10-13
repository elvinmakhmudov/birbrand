<?php

namespace BirBrand\Http\Controllers\Repositories;

use BirBrand\Category;
use BirBrand\Order;
use BirBrand\Product;
use BirBrand\User;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrdersRepository
{
    use ValidatesRequests;

    public function home()
    {
        $orders = Order::with('user', 'products')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.orders.home')->with('orders', $orders);
    }

    public function index($id)
    {
        $user = User::findOrFail($id);

        $orders = $user->orders;

        return view('admin.orders.index')->with(['user' => $user, 'orders' => $orders]);
    }

    public function edit($id)
    {
        $order = Order::with('products', 'user')->findOrFail($id);

        $products = Product::isShown()->get();

        $users = User::all();

        return view('admin.orders.edit')->with(['order' => $order, 'products' => $products, 'users' => $users]);
    }

    public function update($orderId, $request)
    {
        //Validate the request
        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
            'status' => 'nullable|string|max:255',
            'user' => 'nullable|integer',
            'products' => 'required',
            'created_at' => 'nullable|date',
        ]);

        //update the order
        $order = Order::findOrFail($orderId);

        //if delete was clicked, delete the order
        if (!empty($request->get('delete'))) {
            $order->products()->detach();
            $order->delete();
            return redirect()->route('admin.users.index');
        }


        $order->name = $request->get('name');
        $order->number = $request->get('number');
        $order->status = $request->get('status');
        $order->user_id = $request->get('user');
        $order->created_at = $request->get('created_at');

        //detach all existing products and attach new ones
        $order->products()->detach();
        $products = Product::find($request->get('products'));
        foreach ($products as $product) {
            $order->products()->attach($product, ['price' => $product->price, 'amount' => 1]);
        }

        $order->save();
        return redirect()->route('admin.users.index');
    }

    public function create($userId)
    {
        $users = User::all();

        $products = Product::isShown()->get();

        return view('admin.orders.create')->with(['userId' => $userId, 'users' => $users, 'products' => $products]);
    }

    public function store($categoryId, Request $request)
    {
        //Validate the request
        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
            'status' => 'nullable|string|max:255',
            'user' => 'nullable|integer',
            'products' => 'required',
        ]);

        //update the order
        $order = Order::create([]);

        $order->name = $request->get('name');
        $order->number = $request->get('number');
        $order->status = $request->get('status');
        $order->user_id = $request->get('user');

        $products = Product::find($request->get('products'));
        foreach ($products as $product) {
            $order->products()->attach($product, ['price' => $product->price, 'amount' => 1]);
        }

        $order->save();
        return redirect()->route('admin.orders.index', ['id' => Auth::user()->id]);
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

    public function createByAuthUser(Request $request)
    {
        try {
            $products = $request->get('products');
            $order = Order::create([]);
            foreach ($products as $key => $product) {
                $amount = $products[$key]['amount'];
                $product = Product::where('id', $products[$key]['productId'])->first();
                $price = $product->price;
                $options = isset($products[$key]['options']) ? $products[$key]['options'] : null;
                $order->products()->attach($product, ['price' => $price, 'amount' => $amount, 'options' => $options]);
            }
            $order->user()->associate(Auth::user())->save();
            //if bought from cart, destroy the old cart
            if($request->get('fromCart')) {
                Cart::destroy();
            }
            return ['messages' => ['Sifaşiniz qeydə alındı.']];
        } catch (Exception $e) {
            return ['errors' => ['Səf baş verdi.']];
        }
    }

    public function createByRequest(Request $request)
    {
        try {
            $products = $request->get('products');
            $order = Order::create([
                'name' => $request->get('name'),
                'number' => $request->get('number')
            ]);
            foreach ($products as $key => $product) {
                $amount = $products[$key]['amount'];
                $product = Product::where('id', $products[$key]['productId'])->first();
                $price = $product->price;
                $options = isset($products[$key]['options']) ? $products[$key]['options'] : null;
                $order->products()->attach($product, ['price' => $price, 'amount' => $amount, 'options' => $options]);
            }
            $order->user()->associate(Auth::user())->save();
            //if bought from cart, destroy the old cart
            if($request->get('fromCart')) {
                Cart::destroy();
            }
            return ['messages' => ['Sifaşiniz qeydə alındı.']];
        } catch (Exception $e) {
            return ['errors' => ['Səf baş verdi.']];
        }
    }

}
