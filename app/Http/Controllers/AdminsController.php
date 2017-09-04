<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Http\Controllers\Repositories\BannersRepository;
use BirBrand\Http\Controllers\Repositories\CarouselsRepository;
use BirBrand\Http\Controllers\Repositories\CategoriesRepository;
use BirBrand\Http\Controllers\Repositories\OrdersRepository;
use BirBrand\Http\Controllers\Repositories\ProductsRepository;
use BirBrand\Http\Controllers\Repositories\UsersRepository;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * @var ProductsRepository
     */
    private $products;
    /**
     * @var CategoriesRepository
     */
    private $categories;
    /**
     * @var UsersRepository
     */
    private $users;
    /**
     * @var OrdersRepository
     */
    private $orders;
    /**
     * @var CarouselsRepository
     */
    private $carousels;
    /**
     * @var BannersRepository
     */
    private $banners;

    public function __construct(ProductsRepository $products, CategoriesRepository $categories, UsersRepository $users, OrdersRepository $orders, CarouselsRepository $carousels, BannersRepository $banners)
    {
        $this->middleware('admin');
        $this->products = $products;
        $this->categories = $categories;
        $this->users = $users;
        $this->orders = $orders;
        $this->carousels = $carousels;
        $this->banners = $banners;
    }

    public function index()
    {
        return view('admin.home');
    }

    public function getCategoriesIndex()
    {
        return $this->categories->index();
    }

    public function getCategoriesEdit($id)
    {
        return $this->categories->edit($id);
    }

    public function postCategoriesUpdate($id, Request $request)
    {
        return $this->categories->update($id, $request);
    }

    public function getCategoriesCreate()
    {
        return $this->categories->create();
    }

    public function postCategoriesStore(Request $request)
    {
        return $this->categories->store($request);
    }


    public function getProductsIndex($id, Request $request)
    {
        return $this->products->index($id, $request);
    }

    public function getProductsEdit($id)
    {
        return $this->products->edit($id);
    }


    public function postProductsUpdate($categoryId, $productId, Request $request)
    {
        return $this->products->update($categoryId, $productId, $request);

    }

    public function getProductsCreate($categoryId)
    {
        return $this->products->create($categoryId);
    }

    public function postProductsStore($categoryId, Request $request)
    {
        return $this->products->store($categoryId,$request);
    }

    public function getUsersIndex()
    {
        return $this->users->index();
    }

    public function getUsersEdit($id)
    {
        return $this->users->edit($id);
    }

    public function postUsersUpdate($id, Request $request)
    {
        return $this->users->update($id, $request);
    }

    public function getUsersCreate()
    {
        return $this->users->create();
    }

    public function postUsersStore(Request $request)
    {
        return $this->users->store($request);
    }

    public function getOrdersHome()
    {
        return $this->orders->home();
    }

    public function getOrdersIndex($userId)
    {
        return $this->orders->index($userId);
    }

    public function getOrdersEdit($id)
    {
        return $this->orders->edit($id);
    }

    public function postOrdersUpdate($id, Request $request)
    {
        return $this->orders->update($id, $request);
    }

    public function getOrdersCreate($userId)
    {
        return $this->orders->create($userId);
    }

    public function postOrdersStore($userId, Request $request)
    {
        return $this->orders->store($userId, $request);
    }

    public function getCarouselsIndex()
    {
        return $this->carousels->index();
    }

    public function getCarouselsEdit($id)
    {
        return $this->carousels->edit($id);
    }

    public function postCarouselsUpdate($id, Request $request)
    {
        return $this->carousels->update($id, $request);
    }

    public function getCarouselsCreate()
    {
        return $this->carousels->create();
    }

    public function postCarouselsStore(Request $request)
    {
        return $this->carousels->store($request);
    }

    public function getBannersIndex()
    {
        return $this->banners->index();
    }

    public function getBannersEdit($id)
    {
        return $this->banners->edit($id);
    }

    public function postBannersUpdate($id, Request $request)
    {
        return $this->banners->update($id, $request);
    }

    public function getBannersCreate()
    {
        return $this->banners->create();
    }

    public function postBannersStore(Request $request)
    {
        return $this->banners->store($request);
    }
}
