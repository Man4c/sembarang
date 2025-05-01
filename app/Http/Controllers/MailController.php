<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'no_telp' => 'required|string',
                'alamat' => 'required|string|max:255',
                'password' => 'required|string|min:8',
            ],
            [
                'name.required' => '*nama wajib diisi',
                'email.required' => '*email wajib diisi',
                'no_telp.required' => '*no telp wajib diisi',
                'alamat.required' => '*alamat wajib diisi',
                'password.required' => '*password wajib diisi',
            ]
        );

        $otp = rand(100000, 999999);

        Mail::to($request->email)->send(new SendOtpMail($otp));

        session([
            'email' => $request->email,
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'otp' => $otp,
        ]);

        return redirect('/verify')->with('success', 'OTP telah dikirim  ke email anda.');
    }

    public function checkOtp(Request $request)
    {
        if ($request->otp == session('otp')) {
            User::create([
                'name' => session('name'),
                'email' => session('email'),
                'no_telp' => session('no_telp'),
                'alamat' => session('alamat'),
                'password' => session('password'),
                'otp' => '-',
            ]);
            session()->forget(['name', 'email', 'password', 'otp']);
            return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
        } else {
            return redirect()->back()->with('error', 'OTP yang anda massukkan salah');
        }
    }

    public function login_acces(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'password' => 'required|string'
            ],
            [
                'name.required' => '*nama pengguna harus diisi.',
                'password.required' => '*kata sandi harus diisi.'
            ]
        );
        $data_login = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($data_login)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'pelanggan') {
                return redirect('/udashboard');
            } elseif (Auth::user()->role == 'pimpinan') {
                return redirect('/laporan');
            }

            return redirect('/dashboard')->with('succes', 'Login Berhasil');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
