<?php

namespace BirBrand\Http\Controllers\Repositories;

use BirBrand\Order;
use BirBrand\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersRepository {

    public function createByAuthUser(Request $request) {
        try {
            $productId = $request->get('productId');
            $amount = $request->get('amount');
            $product = Product::where('id', $productId)->first();
            $price = $product->price;
            $order = Order::create([]);
            $order->user()->associate(Auth::user())->save();
            $product->orders()->attach($order, ['price' => $price, 'amount' => $amount]);
            return ['messages' => ['Sifaşiniz qeydə alındı.']];
        } catch(Exception $e) {
            return ['errors' => ['Sef bash verdi.']];
        }
    }

    public function createByRequest(Request $request) {
        try {
            $productId = $request->get('productId');
            $amount = $request->get('amount');
            $product = Product::where('id', $productId)->first();
            $price = $product->price;
            $order = Order::create([
                'name' => $request->get('name'),
                'number' => $request->get('number')
            ]);
            $product->orders()->attach($order, ['price' => $price, 'amount' => $amount]);
            return ['messages' => ['Sifaşiniz qeydə alındı.']];
        } catch(Exception $e) {
            return ['errors' => ['Sef bash verdi.']];
        }

    }
}
