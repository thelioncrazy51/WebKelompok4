@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(to right, #fbf8ef, #edf6f0);')

@section('container')
<style>
    .article-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1f3b1f;
    }
    .article-subtitle {
        font-size: 1.1rem;
        color: #445b44;
        max-width: 720px;
        margin: auto;
    }
    .card-custom {
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    .btn-read {
        transition: 0.3s;
        font-weight: 500;
        border-radius: 10px;
    }
    .btn-read:hover {
        background-color: #0b5d1e;
        color: #fff;
        border-color: #0b5d1e;
    }
</style>

<div class="container py-5">
    <h1 class="text-center article-title mb-3 animate__animated animate__fadeInDown">
        Berita & <span style="color: #ff3c00;">Artikel</span> Terbaru
    </h1>
    <p class="text-center article-subtitle mb-5 animate__animated animate__fadeInUp">
        Ikuti perkembangan teknologi pertanian dan temukan wawasan menarik seputar Smart Farming, inovasi agrikultur, dan kisah petani modern.
    </p>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Artikel 1 -->
        <div class="col animate__animated animate__fadeInUp animate__delay-1s">
            <div class="card card-custom h-100 shadow-sm">
                <img src="{{ asset('image/sensor.png') }}" class="card-img-top" alt="Artikel 1">
                <div class="card-body">
                    <h5 class="card-title poppins fw-semibold">Penerapan IoT dalam Pertanian</h5>
                    <p class="text-muted" style="font-size: 13px;">Dipublikasikan: 10 Mei 2025</p>
                    <p class="card-text">Bagaimana Teknologi Internet of Things (IoT) dapat membantu petani meningkatkan hasil panen secara presisi dan efisien.</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="/penerapaniot" class="btn btn-outline-success btn-read w-100">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Artikel 2 -->
        <div class="col animate__animated animate__fadeInUp animate__delay-2s">
            <div class="card card-custom h-100 shadow-sm">
                <img src="{{ asset('image/teknik.png') }}" class="card-img-top" alt="Artikel 2">
                <div class="card-body">
                    <h5 class="card-title poppins fw-semibold">Panen Pepaya Lebih Cepat</h5>
                    <p class="text-muted" style="font-size: 13px;">Dipublikasikan: 8 Mei 2025</p>
                    <p class="card-text">Teknik pertanian modern mempercepat masa panen pepaya hingga 20% dibandingkan metode konvensional.</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="/panenpepaya" class="btn btn-outline-success btn-read w-100">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Artikel 3 -->
        <div class="col animate__animated animate__fadeInUp animate__delay-3s">
            <div class="card card-custom h-100 shadow-sm">
                <img src="{{ asset('image/ketahanan.png') }}" class="card-img-top" alt="Artikel 3">
                <div class="card-body">
                    <h5 class="card-title poppins fw-semibold">Mengapa Smart Farming Itu Penting?</h5>
                    <p class="text-muted" style="font-size: 13px;">Dipublikasikan: 6 Mei 2025</p>
                    <p class="card-text">Mengenal konsep Smart Farming dan bagaimana kontribusinya terhadap ketahanan dan kemandirian pangan nasional.</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="/smartfarmingart" class="btn btn-outline-success btn-read w-100">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

