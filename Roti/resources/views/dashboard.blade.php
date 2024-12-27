@extends('layouts.app')

@section('content')


    <!-- Main Content -->
    <section class="hero">
        <div class="hero-text">
            <h1>Pilihan <span class="highlight">Tepat</span> Untuk Para Pecinta Cokelat</h1>
            <p>Dengan tekstur yang lembut, rasa cokelat yang intens, dan kualitas bahan terbaik. Nikmati setiap gigitan yang penuh kelezatan, dibuat dengan cinta dan kehangatan untuk momen istimewa Anda!</p>
            <div class="cta-buttons">
                <a href="/menu" class="btn">Lihat Menu</a>
                <a href="/contact" class="btn">Pemesan</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('gambar/cake1.png') }}" alt="Cake Image">
        </div>
    </section>

    <!-- Menu Section -->
    <section class="menu">
        <div class="menu-item">
            <div class="icon">🍰</div>
            <h3>Cake</h3>
            <p>Kue ini dibuat dengan mentega</p>
        </div>
        <div class="menu-item">
            <div class="icon">🍪</div>
            <h3>Cookies</h3>
            <p>Kue kering ini dibuat dengan lemak nabati</p>
        </div>
        <div class="menu-item">
            <div class="icon">🍞</div>
            <h3>Bread</h3>
            <p>Roti ini dibuat dengan telur dan tepung</p>
        </div>
    </section>
@endsection
