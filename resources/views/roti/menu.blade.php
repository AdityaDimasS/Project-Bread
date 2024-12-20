@extends('layouts.menus')

@section('content')
<!-- Menu Section -->
<section class="menu-section">
    <h2>DAFTAR MENU KAMI</h2>
    <div class="menu-list">
        @foreach($menus as $menu)
            <div class="menu-card">
                <div class="menu-card-image">
                    <!-- Menampilkan gambar dari path yang ada di database -->
                    <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}">
                </div>
                <div class="menu-card-content">
                    <!-- Menampilkan nama menu -->
                    <h3>{{ $menu->name }}</h3>
                    <!-- Menampilkan deskripsi menu -->
                    <p class="description">{{ $menu->description }}</p>
                    <!-- Menampilkan harga dengan format rupiah -->
                    <p class="price">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                    <!-- Tombol pesan -->
                    <a href="https://wa.me/087794082895?text=Halo, Silahkan Menghubungi Nomor Ini Untuk Melakukan Pre Order." target="_blank" class="btn-order">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
