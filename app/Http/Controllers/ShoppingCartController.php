<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use http\Exception;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required|exists:products,id|integer',
            'options' => 'nullable|json',
            'amount' => 'required|integer|max:100'
        ]);

        //try to add an item to the cart
        try {
            $productId = $request->get('productId');
            $amount = $request->get('amount');
            $product = Product::where('id', $productId)->first();
            $price = $product->price;

            //add thumbnail field to the options
            $options = ['thumbnail' => $product->thumbnail, 'details' => $request->get('options')];

            //add the product to the cart
            Cart::add($product->id, $product->title, $amount, $price, $options);

            $cart = ['cartItems' => Cart::content(), 'cartTotal' => Cart::total()];

            return ['cart' => $cart, 'messages' => ['Sifaşiniz səbətə əlavə olundu.']];
        } catch (Exception $e) {
            return ['errors' => ['Səf baş verdi.']];
        }

    }

    public function destroy(Request $request)
    {
        $this->validate($request, [
            'rowId' => 'required|string']);
        Cart::remove($request->rowId);

        $cart = ['cartItems' => Cart::content(), 'cartTotal' => Cart::total()];

        return ['cart' => $cart, 'messages' => ['Sifaşiniz səbətə əlavə olundu.']];
    }
}
