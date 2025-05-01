@extends('layouts.register')
@section('register_content')
<div class="container">
    <div class="main">
        <div class="main-poster">
            <img src="{{ asset('images/rdr2.jpg') }}" alt="Poster Image">
        </div>
        <div class="main-login">
            <h1>Rental PS</h1>
            <h2>Register</h2>
            <form action="{{ route('send-otp') }}" method="post">
                @csrf
                <div class="class-input">
                    <input type="text" id="username" name="name" placeholder="Username">
                    @error('name')
                        <p style="color: red; font-size: 12px; bottom: -7; margin: 0; padding: 0;">{{ $message }}</p>
                    @enderror
                    <input type="email" id="email" name="email" placeholder="Email">
                    @error('email')
                        <p style="color: red; font-size: 12px">{{ $message }}</p>
                    @enderror
                    <input type="text" id="no_telp" name="no_telp" placeholder="Nomor Telpon">
                    @error('no_telp')
                        <p style="color: red; font-size: 12px">{{ $message }}</p>
                    @enderror
                    <input type="text" id="alamat" name="alamat" placeholder="Alamat">
                    @error('alamat')
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
                    <div class="btn-group">
                        <button type="submit">Register</button>
                        <button type="reset">Cancel</button>
                    </div>
                    <div class="back-login">
                        <p>Sudah punya akun? <a href="/login">Login.</a></p>
                    </div>
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
