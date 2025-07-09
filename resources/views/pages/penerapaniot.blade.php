@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(135deg, #0b3d0b, #a7d7a7);')

@section('title', 'Penerapan IoT dalam Pertanian')

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
        padding: 2rem;
        margin-bottom: 2rem;
    }
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 36px 0 rgba(0, 0, 0, 0.3);
    }
    .article-title {
        color: #145214;
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
        text-shadow: 1px 1px 3px rgba(5, 43, 5, 0.2);
        position: relative;
        padding-bottom: 10px;
    }
    .article-title::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background: #145214;
        bottom: 0;
        left: 0;
        border-radius: 2px;
    }
    .article-content {
        color: #0b3d0b;
        font-size: 1.1rem;
        line-height: 1.8;
        text-align: justify;
    }
    .article-image {
        border-radius: 15px;
        margin: 1.5rem 0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        width: 100%;
        height: auto;
        display: block;
    }
    .highlight-box {
        background: rgba(20, 82, 20, 0.1);
        border-left: 4px solid #145214;
        padding: 1.5rem;
        border-radius: 0 8px 8px 0;
        margin: 1.5rem 0;
    }
    .highlight-keyword {
        color: #145214;
        font-weight: 600;
    }
    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin: 2rem 0;
    }
    .benefit-item {
        background: rgba(20, 82, 20, 0.08);
        padding: 1rem;
        border-radius: 8px;
        display: flex;
        align-items: center;
    }
    .benefit-item i {
        margin-right: 10px;
        color: #145214;
    }
</style>

<div class="glass-card">
    <h1 class="article-title">Penerapan IoT dalam Pertanian: Revolusi Digital di Lahan Pertanian</h1>
    
    <img src="{{ asset('image/sensor.png') }}" alt="Smart Farming dengan IoT" class="article-image">
    
    <div class="article-content">
        <p>Teknologi <span class="highlight-keyword">Internet of Things (IoT)</span> telah menjadi game changer dalam sektor pertanian modern. Dengan menghubungkan perangkat sensor, alat pintar, dan sistem analitik berbasis cloud, IoT memungkinkan petani untuk <span class="highlight-keyword">memantau kondisi lahan secara real-time</span> dari mana saja. Data akurat tentang kelembapan tanah, kadar nutrisi, intensitas cahaya, dan pertumbuhan tanaman dapat dikumpulkan secara otomatis, membantu pengambilan keputusan yang lebih presisi.</p>

        <div class="highlight-box">
            <p>Salah satu implementasi IoT yang paling berdampak adalah <span class="highlight-keyword">sistem irigasi cerdas</span>. Sensor tanah yang terhubung dengan jaringan IoT dapat mengukur kadar air secara berkala dan mengaktifkan penyiraman hanya ketika diperlukan. Menurut penelitian, teknologi ini mampu <span class="highlight-keyword">mengurangi penggunaan air hingga 30%</span> sekaligus meningkatkan hasil panen hingga 20%.</p>
        </div>

        <p>Selain itu, <span class="highlight-keyword">drone dan robot pertanian berbasis IoT</span> mulai banyak digunakan untuk berbagai tugas. Drone dilengkapi kamera multispektral dapat memetakan kesehatan tanaman, mendeteksi serangan hama sejak dini, bahkan menyemprot pestisida dengan presisi tinggi. Sementara robot tanam dan panen otomatis sudah digunakan di berbagai perkebunan besar, <span class="highlight-keyword">mengurangi ketergantungan pada tenaga kerja manual</span> sekaligus meningkatkan efisiensi.</p>

        <p>Integrasi IoT dengan <span class="highlight-keyword">kecerdasan buatan (AI)</span> dan <span class="highlight-keyword">big data</span> membawa pertanian ke level berikutnya. Sistem prediksi berbasis AI dapat menganalisis data historis dan kondisi cuaca untuk memberikan rekomendasi waktu tanam yang tepat, jenis pupuk yang dibutuhkan, atau potensi risiko gagal panen. Petani juga bisa menerima <span class="highlight-keyword">peringatan dini</span> tentang cuaca ekstrem atau wabah penyakit melalui notifikasi di smartphone mereka.</p>

        <div class="benefits-grid">
            <div class="benefit-item">
                <i class="fas fa-tint"></i>
                <span>Penghematan air dan pupuk hingga 30%</span>
            </div>
            <div class="benefit-item">
                <i class="fas fa-chart-line"></i>
                <span>Peningkatan hasil panen 15-25%</span>
            </div>
            <div class="benefit-item">
                <i class="fas fa-bug"></i>
                <span>Deteksi dini masalah tanaman</span>
            </div>
            <div class="benefit-item">
                <i class="fas fa-robot"></i>
                <span>Otomatisasi proses pertanian</span>
            </div>
        </div>

        <p>Masa depan pertanian semakin cerah dengan adopsi IoT. <span class="highlight-keyword">Smart farming</span> tidak hanya membuat proses budidaya lebih efisien dan produktif, tetapi juga membuka peluang bagi petani skala kecil untuk bersaing di pasar global. Dengan dukungan teknologi ini, pertanian presisi yang berkelanjutan bukan lagi impian, melainkan kenyataan yang sedang kita jalani.</p>

        <div class="highlight-box">
            <p><strong>Tertarik menerapkan IoT di lahan Anda?</strong> Mulailah dengan sistem monitoring sederhana dan rasakan perbedaannya! Hubungi tim ahli smart farming kami untuk konsultasi gratis.</p>
        </div>
    </div>
</div>

@endsection
