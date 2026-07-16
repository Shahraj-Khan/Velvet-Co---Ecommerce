<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class AdminController extends Controller
{

    public function login()
    {
        if (!auth()->guard('admin')->check()) {
            return view('login');
        }
        return redirect()->route('admin.dashboard');
    }
    public function logout()
    {
        auth()->guard('admin')->logout() ;
        return redirect()->route('admin.login');
    }

    public function auth(AuthAdminRequest $request)
    {
        if ($request->validated()) {
            if (auth()->guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }else{
        return redirect()->route('admin.login')->with([
            'error'=>'The provided credentials are incorrect'
        ]);

            }
        }
    }
}
