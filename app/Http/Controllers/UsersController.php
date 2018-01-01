<?php

namespace BirBrand\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('current');
    }

    public function show()
    {
    }

    public function index()
    {
//        return Auth::user();
    }

    public function current()
    {
        return Auth::user();
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'number' => [
                'required', 'string', 'max:255',
                Rule::unique('users')->ignore($user->number, 'number')
                ],
            'address' => 'nullable|string',
            'password' => 'required|string|min:6',
        ]);
        if (Hash::check($request->get('password'), $user->getAuthPassword())) {
            $user->name = $request->get('name');
            $user->number = $request->get('number');
            $user->address = $request->get('address');
            $user->save();
            return response()->json(['messages' => ['Sehifeniz yenilendi.']], 200);
        }

        return response()->json(['password' => ['Şifrə yalnışdır']],400);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6',
        ]);
        $user = Auth::user();
        if (Hash::check($request->get('password'), $user->getAuthPassword())) {
            $user->password= bcrypt($request->get('new_password'));
            $user->save();
            return response()->json(['messages' => ['Shifreniz yenilendi.']]);
        }
        return response()->json(['password' => ['Şifrə yalnışdır']], 400);
    }
}
