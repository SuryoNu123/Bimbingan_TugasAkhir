<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required'
        ]);

        $user = DB::table('users')->where('nim', $request->nim)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user]);
            return redirect('/dashboard');
        }

        return back()->with('error', 'NIM atau Password salah!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/home');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:users,nim',
            'password' => 'required|confirmed|min:5'
        ]);

        DB::table('users')->insert([
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/login')
            ->with('success', 'Pendaftaran berhasil');
    }
    
}