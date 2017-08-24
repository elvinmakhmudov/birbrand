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
                'productId' => 'required|exists:products,id|integer',
                'amount' => 'required|integer|max:100'
            ]);
            return $this->orders->createByAuthUser($request);
        } else {
            $this->validate($request, [
                'productId' => 'required|exists:products,id|integer',
                'amount' => 'required|integer|max:100',
                'name' => 'required|string|max:255',
                'number' => 'required|string|max:255',
            ]);
            return $this->orders->createByRequest($request);
        }
    }

    public function index() {
        $orders = Auth::user()->orders()->orderBy('created_at', 'desc')->get();
        return $orders;
    }
}
