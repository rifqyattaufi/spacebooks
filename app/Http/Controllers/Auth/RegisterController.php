<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store()
    {
        $credentials = $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'email|required|string',
            'password' => 'required|string|confirmed'
        ]);

        $credentials['password'] = Hash::make($credentials['password']);

        User::create($credentials);

        return redirect()->route('login')->with('success', 'User created successfully');
    }

    public function adminIndex()
    {
        return view('auth.admin-register');
    }

    public function adminStore()
    {
        $credentials = $this->validate(request(), [
            'email' => 'email|required|string|unique:admins,email',
            'password' => 'required|string|confirmed'
        ]);

        $credentials['password'] = Hash::make($credentials['password']);

        Admin::create($credentials);

        return redirect()->route('admin.login')->with('success', 'User created successfully');
    }
}
