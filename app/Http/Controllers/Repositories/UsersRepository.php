<?php

namespace BirBrand\Http\Controllers\Repositories;

use BirBrand\Category;
use BirBrand\Order;
use BirBrand\Product;
use BirBrand\User;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UsersRepository
{
    use ValidatesRequests;

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit')->with(['user' => $user]);
    }

    public function update($id, $request)
    {
        //Validate the request
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'number' => 'required|integer',
            'password' => 'nullable|string|min:6',
            'address' => 'nullable|string',
            'is_admin' => 'nullable',
        ]);

        //update the user
        $user= User::findOrFail($id);
        $user->name = $request->get('name');
        $user->number= $request->get('number');
        if($request->get('password')){
            $user->password= bcrypt($request->get('password'));
        }
        $user->address = $request->get('address');
        $user->is_admin= $request->get('is_admin') ? true : false;
        $user->save();

        //flush the cache because the item has been updated
        Cache::flush();

        return redirect()->route('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        //Validate the request
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'number' => 'required|integer',
            'password' => 'required|string|min:6',
            'address' => 'nullable|string',
            'is_admin' => 'nullable',
        ]);

        //create a user
        $user= new User;
        $user->name = $request->get('name');
        $user->number= $request->get('number');
        $user->password= bcrypt($request->get('password'));
        $user->address = $request->get('address');
        $user->is_admin= $request->get('is_admin') ? true : false;
        $user->save();

        //flush the cache because the item has been updated
        Cache::flush();

        return redirect()->route('admin.users.index');
    }
}
