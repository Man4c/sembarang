@extends('layouts.verifikasi')
@section('verifikasi_content')
<div class="card">
    <h1>Verifikasi Akun</h1>
    <form action="/check-register-otp" method="post">
        @csrf
        <label>Masukan Kode Verifikasi</label>
        <input type="email" placeholder="Email" name="email" value="{{ session('email') }}"  readonly>
        <input type="text" placeholder="KODE-OTP" name="otp">
        @error('otp')
            <p style="color: red; font-size: 12px">{{ $message }}</p>
        @enderror
        <button type="submit" class="verify-button">Verifikasi</button>
        <a href="/register" class="kembali">Kembali</a>
    </form>
</div>
@endsection
