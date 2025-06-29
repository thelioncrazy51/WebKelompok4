@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(135deg, #edf6ed, #d7ecd7);')

@section('container')
<style>
    .career-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #0b580b;
        text-shadow: 1px 1px 4px #cbeacb;
    }
    .career-subtitle {
        font-size: 1.1rem;
        color: #2c552c;
        max-width: 750px;
        margin: 0 auto;
    }
    .career-card {
        background: rgba(255, 255, 255, 0.75);
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 8px 24px rgba(0, 80, 0, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .career-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(0, 60, 0, 0.25);
    }
    .btn-social {
        font-weight: 600;
        border-radius: 12px;
        padding: 10px 18px;
        transition: all 0.3s ease;
    }
    .btn-social:hover {
        transform: scale(1.05);
    }
</style>

<div class="container py-5">
    <h1 class="text-center career-title mb-3 animate__animated animate__fadeInDown">
        Bergabunglah dalam <span style="color:#0a730a;">Revolusi Smart Farming</span>
    </h1>
    <p class="text-center career-subtitle animate__animated animate__fadeInUp">
        Jadilah bagian dari pertanian modern berbasis teknologi! Tumbuh bersama kami dalam membangun masa depan pertanian Indonesia yang cerdas, adil, dan berkelanjutan.
    </p>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="career-card text-center animate__animated animate__fadeInUp">
                <img src="{{ asset('image/sm4.jpg') }}" alt="Karir Smart Farming" class="img-fluid rounded shadow mb-4" style="max-height: 320px; object-fit: cover;">
                <p class="poppins" style="font-size: 1.05rem; color: #2c552c;">
                    Kami membuka pintu untuk Anda yang punya semangat inovasi, keinginan untuk belajar, dan kepedulian terhadap dunia pertanian. 
                    Bersama kami, Anda akan terlibat dalam proyek nyata, pelatihan teknologi pertanian digital, dan membangun koneksi dengan para profesional dari berbagai bidang. 
                    Ini bukan hanya pekerjaan — ini adalah panggilan untuk membawa perubahan.
                </p>
                <p class="poppins mt-3" style="font-size: 1rem; color: #396e39;">
                    Apapun latar belakang Anda — teknologi, agribisnis, desain, atau sosial — jika Anda peduli pada pangan dan masa depan, tempat Anda ada di sini.
                </p>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 animate__animated animate__fadeInUp">
        <h5 class="fw-bold poppins mb-3" style="color:#0a5a0a;">Hubungi Kami Sekarang</h5>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <a href="https://wa.me/6285624239378" target="_blank" class="btn btn-success btn-social d-flex align-items-center gap-2">
                <i class="bi bi-whatsapp"></i> WhatsApp
            </a>
            <a href="https://instagram.com/smartfarming.id" target="_blank" class="btn btn-outline-danger btn-social d-flex align-items-center gap-2">
                <i class="bi bi-instagram"></i> Instagram
            </a>
            <a href="mailto:karir@smartfarming.id" class="btn btn-outline-success btn-social d-flex align-items-center gap-2">
                <i class="bi bi-envelope-fill"></i> Email
            </a>
        </div>
    </div>
</div>
@endsection
