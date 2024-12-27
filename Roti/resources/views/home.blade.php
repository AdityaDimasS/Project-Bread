<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edelweiss</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <header>
        <div class="logo">
            <a href="/">
                <img src="{{ asset('gambar/logo2.png') }}" alt="Logo" class="logo-img">
            </a>
        </div>
        <nav>
            
        </nav>
    </header>

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
            <p>These cakes are made with butter</p>
        </div>
        <div class="menu-item">
            <div class="icon">🍪</div>
            <h3>Cookies</h3>
            <p>These cookies are made with vegetable fat</p>
        </div>
        <div class="menu-item">
            <div class="icon">🍞</div>
            <h3>Bread</h3>
            <p>These breads are made with eggs and flour</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Toko Roti Edelweiss</p>
    </footer>
</body>
</html>
