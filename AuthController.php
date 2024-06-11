<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function reg(){
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // $validated = request()->validate([
        //     'name' => 'required|min:3|max:40',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|confirmed'
        // ]);

         User::create(
            [
                'name' => $request['name'],
                'email' => $request['email'],
                'mobile' => $request['mobile'],
                'password' => Hash::make($request['password']),
            ]
        );

        return redirect()->route('login');
    }
    public function logout(){


        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }

}
