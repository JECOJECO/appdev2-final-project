<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register()
    {
        // return redirect('/verify');
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('login')->with(['user' => $user])->with('success', 'Account Created');
    }

    public function login()
    {
        // return redirect('/verify');
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if(auth()->attempt($validated))
        {
            request()->session()->regenerate();
            return redirect()->route('home')->with('success', 'Logged in Successfully');
        }

        // $user = $request->user();
        // $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json([
        //     'access_token' => $token,
        //     'token_type' => 'Bearer',
        // ])->header('Location', '/home');

        return redirect()->route('login')->withErrors([
            'email' => "No matching user found",

        ]);
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged out Successfully')
    }
}
