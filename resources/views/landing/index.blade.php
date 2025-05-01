@extends('layouts.landing')
@section('landing_content')
<div class="main-navbar">
    <div class="navbar">
      <div class="nav-logo">
        <p style="font-weight: bold">RENTAL PS</p>
      </div>
      <div class="nav-list">
        <ul>
          <li class="nav-item"><a href="#">Home</a></li>
          <li class="nav-item"><a href="#">About</a></li>
          <li class="nav-item"><a href="#">Services</a></li>
          <li class="nav-item"><a href="#">Contact</a></li>
        </ul>
        <a href="{{ route('login') }}">Login</a>
      </div>
    </div>
  </div>
  <div class="container-home">
    <section id="home">
      <div class="cont-home">
        <div class="container-title">
          <div class="cont-title-text">
            <div class="one title-home">TUGAS NUMPUK?</div>
            <div class="two title-home">RENTAL PS AJA.</div>
          </div>
          <div class="cont-lorem">
            <p>
              Dapatkan akses ke game impian tanpa harus membeli konsol! Pilih paket rental sesuai kebbutuhanmu dan nikmati pengalaman gaming terbaik tanpa batas. Mulailah petualangan gamingmu sekarang juga dan rasakan keseruan dari berbagai judul game terbaru tanpa repot!
            </p>
          </div>
          <div class="btn-read"><a href="#">PESAN SEKARANG</a></div>
        </div>
        <div class="container-img">
          <img src="{{ asset('images/ps0.png') }}" alt="" />
        </div>
      </div>
    </section>
  </div>
  <div class="decoration" style="top: 20%; right: 10%"></div>
  <div class="decoration" style="top: 25%; right: 30%"></div>
  <div class="decoration" style="top: 80%; right: 15%"></div>
  <div class="decoration" style="top: 30%; right: 50%"></div>
  <div class="decoration" style="top: 50%; right: 40%"></div>
  <div class="decoration" style="top: 70%; right: 45%"></div>
  <div class="decoration" style="top: 85%; right: 25%"></div>
  <div class="decoration" style="top: 45%; right: 5%"></div>
@endsection
