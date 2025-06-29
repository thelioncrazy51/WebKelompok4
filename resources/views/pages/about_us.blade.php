@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(135deg, #0b3d0b, #a7d7a7);')

@section('container')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.89);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.25);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .glass-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px 0 rgba(0, 0, 0, 0.35);
    }
    .section-title {
        position: relative;
        display: inline-block;
        padding-bottom: 8px;
        margin-bottom: 25px;
        font-weight: 800;
        font-size: 2.5rem;
        color: #145214;
        text-shadow: 1px 1px 6px #052b05;
    }
    .section-title::after {
        content: '';
        position: absolute;
        width: 60px;
        height: 5px;
        background: #145214;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 4px;
        box-shadow: 0 0 8px #145214;
    }
    .text-highlight {
        color: #145214;
        font-weight: 700;
    }
    ul.mission-list {
        list-style: none;
        padding-left: 0;
        font-weight: 500;
        color: #145214;
    }
    ul.mission-list li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }
    ul.mission-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        top: 0;
        color: #145214;
        font-weight: 700;
        font-size: 1.3rem;
        text-shadow: 0 0 4px #093809;
    }
    p, li, h5, h6 {
        color: #145214;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="section-title">Smart Farming</h1>
        <p class="lead mx-auto" style="max-width: 720px; font-weight: 500; font-size: 1.2rem;">
            Smart Farming menggabungkan teknologi mutakhir dengan praktik pertanian berkelanjutan untuk meningkatkan efisiensi dan produktivitas. Melalui inovasi Internet of Things (IoT), pengelolaan lahan cerdas, dan pemasaran langsung, kami menciptakan ekosistem pertanian modern yang menguntungkan petani dan konsumen.
        </p>
    </div>

    <div class="row gy-4 align-items-center">
        <div class="col-md-5 order-md-2">
            <img src="{{ asset('image/sm1.jpg') }}" alt="Smart Farming" class="img-fluid rounded shadow-lg" style="object-fit: cover; max-height: 420px; filter: drop-shadow(0 0 8px #2aad2a);">
        </div>
        <div class="col-md-7 order-md-1">
            <div class="glass-card p-4 mb-4">
                <h2 class="text-highlight">Visi</h2>
                <p>Menjadi pionir inovasi teknologi pertanian yang memberdayakan petani Indonesia dan memastikan ketahanan pangan nasional.</p>
            </div>
            <div class="glass-card p-4 mb-4">
                <h2 class="text-highlight">Misi</h2>
                <ul class="mission-list">
                    <li>Mengintegrasikan teknologi presisi untuk meningkatkan hasil panen.</li>
                    <li>Menghubungkan petani langsung dengan pasar melalui platform digital.</li>
                    <li>Mendorong keberlanjutan dan pelestarian lingkungan dalam praktik pertanian.</li>
                </ul>
            </div>
            <div class="glass-card p-4">
                <h2 class="text-highlight">Komitmen Kami</h2>
                <p>Kami berkomitmen untuk terus berinovasi, mendukung petani, serta menjaga kelestarian alam demi masa depan pertanian yang cerah dan berkelanjutan.</p>
            </div>
        </div>
    </div>
    <br><hr style="border: 1px solid black">
    <div class="text-center mb-5">
        <br><h1 class="section-title">Our Team</h1>
        <div class="container-our-team">
            <p class="lead mx-auto" style="font-weight: 500; font-size: 1.2rem;">
                Kami adalah tim yang berkomitmen membangun solusi Smart Farming berbasis teknologi dan kebutuhan petani. Setiap anggota memiliki peran penting dalam merancang, membangun, dan mengembangkan sistem ini.
            </p>
            <div class="team glass-card">
                <img src="{{ asset('image/Saya.png') }}" alt="Foto Saya" class="pict-team-img">
                <div class="team-profile">
                    <h5>Muhammad Tsaqif Habibullah</h5>
                    <h6>22552011225</h6>
                    <h6>Developer Database & Web</h6>
                    <p>Mengembangkan struktur database serta merancang tampilan dan fungsionalitas web agar sistem dapat berjalan optimal dan mudah digunakan oleh pengguna.</p>
                </div>
            </div>
            <div class="team glass-card">
                <img src="{{ asset('image/Novita.png') }}" alt="Foto Novita" class="pict-team-img">
                <div class="team-profile">
                    <h5>Novita Rahmayani</h5>
                    <h6>22552011328</h6>
                    <h6>Konseptor & Pengembang Ide</h6>
                    <p>Bertanggung jawab dalam merancang berbagai konsep dan gagasan utama untuk sistem Smart Farming, termasuk pendekatan solusi dan strategi pengembangan.</p>
                </div>
            </div>
            <div class="team glass-card">
                <img src="{{ asset('image/Zessica.png') }}" alt="Foto Zessica" class="pict-team-img">
                <div class="team-profile">
                    <h5>Zesica Fitriani</h5>
                    <h6>22552011217</h6>
                    <h6>Konseptor & Pengembang Ide</h6>
                    <p>Bersama Novita, Zesica menyusun konsep-konsep inti yang menjadi fondasi sistem, mulai dari perencanaan fitur hingga rancangan user experience.</p>
                </div>
            </div>
            <div class="team glass-card">
                <img src="{{ asset('image/Irfanka.png') }}" alt="Foto Irfanka" class="pict-team-img">
                <div class="team-profile">
                    <h5>Irfanka Hanif</h5>
                    <h6>22552011198</h6>
                    <h6>Teknisi Sistem & Validasi Lapangan</h6>
                    <p>Membantu pada aspek teknis atau pengujian sistem di lapangan.</p>
                </div>
            </div>
            <div class="team glass-card">
                <img src="{{ asset('image/Faldi.png') }}" alt="Foto Faldi" class="pict-team-img">
                <div class="team-profile">
                    <h5>Faldiarsyah D Permana</h5>
                    <h6>22552011223</h6>
                    <h6>Koordinator Operasional</h6>
                    <p>Penanggung jawab koordinasi tim atau dokumentasi</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
