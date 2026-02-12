<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:1|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect('/login');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $DataUser = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);



        if(Auth::attempt($DataUser)) {
            $request->session()->regenerate();
            return redirect('/produto/create');

        }

        return back()->withErrors([
            'email' => 'as credenciais fornecidas nao correspondem ao registro'
        ])->onlyInput('email');

    }



    public function logout(Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
    }

    public function profile(request $request, $id = null) {


        if($id) {
            $user = User::findOrFail($id);
        } else {
            if(!Auth::check()) {
                return redirect(route('login'));
            }

            $user=Auth::user();
        }



        return view('auth.profile', compact('user'));
    }
}
