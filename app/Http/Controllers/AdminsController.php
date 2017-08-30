<?php

namespace BirBrand\Http\Controllers;

use BirBrand\Category;
use BirBrand\Http\Controllers\Repositories\CategoriesRepository;
use BirBrand\Http\Controllers\Repositories\ProductsRepository;
use BirBrand\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

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

    public function __construct(ProductsRepository $products, CategoriesRepository $categories)
    {
        $this->middleware('admin');
        $this->products = $products;
        $this->categories = $categories;
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

    public function getProductsEdit($id, $productId)
    {
        return $this->products->edit($id, $productId);
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
}
