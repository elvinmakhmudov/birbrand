<?php

namespace BirBrand\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show() {
    }

    public function index() {
//        return Auth::user();
    }
    public function current() {
        return Auth::user();
    }
}
