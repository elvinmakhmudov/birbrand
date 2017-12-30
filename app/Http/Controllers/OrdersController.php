<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Http\Controllers\Repositories\OrdersRepository;
use BirBrand\Order;
use BirBrand\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    /**
     * @var OrdersRepository
     */
    private $orders;

    public function __construct(OrdersRepository $repository) {
        $this->orders= $repository;
        $this->middleware('auth')->except('store');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'products' => 'required|array',
                'products.*.productId' => 'required|exists:products,id|integer',
                'products.*.options' => 'nullable|json',
                'products.*.amount' => 'required|integer|max:100',
                'fromCart' => 'boolean'
            ]);
            return $this->orders->createByAuthUser($request);
        } else {
            $this->validate($request, [
                'products' => 'required|array',
                'products.*.productId' => 'required|exists:products,id|integer',
                'products.*.options' => 'nullable|json',
                'products.*.amount' => 'required|integer|max:100',
                'name' => 'required|string|max:255',
                'number' => 'required|string|max:255',
                'fromCart' => 'boolean'
            ]);
            return $this->orders->createByRequest($request);
        }
    }

    public function index() {
        $orders = Auth::user()->orders()->orderBy('created_at', 'desc')->paginate(5);
        return $orders;
    }
}
