@extends('layouts.abouts')

@section('content')
    <!-- About Section -->
    <section class="about">
        <h1>Tentang Toko Roti Edelweiss</h1>
        <p>
            Toko Roti Edelweiss berdiri sejak tahun 2012, berkomitmen untuk memberikan roti 
            dan kue berkualitas tinggi dengan bahan-bahan terbaik. Kami percaya bahwa setiap gigitan 
            roti harus menciptakan momen kebahagiaan bagi pelanggan kami.
        </p>
        <p>
            Dengan tim yang berdedikasi dan penuh semangat, kami terus berinovasi untuk menghadirkan 
            rasa dan kualitas terbaik. Jadikan setiap hari Anda lebih spesial dengan kelezatan produk 
            kami yang dibuat dengan dedikasi tinggi.
        </p>
        <p>
            Kami selalu mengedepankan kepuasan customer kami
        </p>
        <!-- Gambar Map -->
        <div class="image-container">
            <img src="{{ asset('gambar/map.jpg') }}" alt="Foto Toko" class="map-image">
        </div>
    </section>

@endsection
