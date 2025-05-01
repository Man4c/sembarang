@extends('layouts.login')
@section('login_content')
<div class="container">
    <div class="main">
        <div class="main-poster">
            <img src="{{ asset('images/rdr2.jpg') }}" alt="Poster Image">
        </div>
        <div class="main-login">
            <h1>Rental PS</h1>
            <h2>Login</h2>
            @if(session('success'))
                <div class="login-success" style="color: rgb(4, 187, 4)">{{ session('success') }}</div>
            @endif
            <form action="/login-acces" method="post">
                @csrf
                <div class="class-input">
                    <input type="text" id="username" name="name" placeholder="Username">
                    @error('name')
                        <p style="color: red; font-size: 12px">{{ $message }}</p>
                    @enderror
                    <input type="password" id="password" name="password" placeholder="Password">
                    @error('password')
                        <p style="color: red; font-size: 12px">{{ $message }}</p>
                    @enderror
                    <div class="show-password">
                        <input type="checkbox" id="show-password-checkbox">
                        <label for="show-password-checkbox">Show Password</label>
                    </div>
                </div>
                <div class="btn">
                    <button type="submit">Login</button>
                </div>
                <div class="register">
                    <p>Belum punya akun? <a href="/register">Daftar disini.</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('.show-password input').addEventListener('change', function() {
        const passwordField = document.querySelector('input[name="password"]');
        passwordField.type = this.checked ? 'text' : 'password';
    });
</script>
@endsection


