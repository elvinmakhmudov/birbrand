<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Order;
use BirBrand\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
           'productId' => 'required|exists:products,id|integer',
           'amount' => 'required|integer|max:100'
        ]);
        if(Auth::check()) {
            $productId = $request->get('productId');
            $amount= $request->get('amount');
            $product = Product::where('id', $productId)->first();
            $price = $product->price;
            $order = Order::create([]);
            $order->user()->associate(Auth::user())->save();
            $product->orders()->attach($order, ['price' => $price, 'amount' => $amount]);
            return ['Sifaşiniz qeydə alındı.'];
        } else {

        }
    }
}
