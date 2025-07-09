@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(135deg, #0b3d0b, #a7d7a7);')

@section('title', 'Panen Pepaya Lebih Cepat dengan Smart Farming')

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
        max-height: 500px;
        object-fit: cover;
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
    .sub-title {
        color: #145214;
        font-weight: 600;
        font-size: 1.3rem;
        margin: 1.5rem 0 1rem 0;
    }
</style>

<div class="glass-card">
    <h1 class="article-title">Panen Pepaya Lebih Cepat dengan Teknologi Smart Farming</h1>
    
    <img src="{{ asset('images/smart-pepaya.jpg') }}" alt="Budidaya Pepaya dengan Smart Farming" class="article-image">
    
    <div class="article-content">
        <p>Pepaya merupakan tanaman buah yang bernilai ekonomi tinggi, namun masa panennya yang relatif lama (8-12 bulan) sering menjadi kendala bagi petani. Dengan penerapan <span class="highlight-keyword">smart farming</span>, masa panen pepaya dapat dipersingkat menjadi <span class="highlight-keyword">5-7 bulan</span> sekaligus meningkatkan kualitas buah.</p>

        <h3 class="sub-title">1. Pemilihan Bibit Unggul & Perlakuan Khusus</h3>
        <p>Gunakan bibit pepaya hasil <span class="highlight-keyword">kultur jaringan</span> atau varietas unggul seperti California, Bangkok, atau IPB 9 yang memiliki siklus panen lebih cepat. Teknik <span class="highlight-keyword">seed priming</span> (perendaman benih dalam larutan nutrisi khusus) dapat mempercepat perkecambahan hingga 40%.</p>

        <h3 class="sub-title">2. Smart Irrigation System</h3>
        <p>Pasang <span class="highlight-keyword">sensor kelembapan tanah</span> berbasis IoT yang terhubung dengan sistem irigasi otomatis. Tanaman pepaya membutuhkan kelembapan tanah 60-70% untuk pertumbuhan optimal. Penyiraman presisi ini mampu <span class="highlight-keyword">mempercepat fase vegetatif</span> 2-3 minggu lebih cepat dibanding cara konvensional.</p>

        <div class="highlight-box">
            <p>Integrasi IoT dengan <span class="highlight-keyword">kecerdasan buatan (AI)</span> dan <span class="highlight-keyword">big data</span> membawa pertanian pepaya ke level berikutnya. Sistem prediksi berbasis AI dapat menganalisis data historis dan kondisi cuaca untuk memberikan rekomendasi waktu tanam yang tepat.</p>
        </div>

        <h3 class="sub-title">3. Nutrisi Presisi dengan Fertigasi</h3>
        <p>Terapkan sistem <span class="highlight-keyword">fertigasi IoT</span> yang mencampur pupuk dan air secara otomatis berdasarkan data sensor NPK tanah, kebutuhan fase tumbuh, dan kondisi cuaca real-time. Dosis yang tepat dapat <span class="highlight-keyword">meningkatkan pembungaan 30% lebih awal</span>.</p>

        <h3 class="sub-title">4. Kontrol Lingkungan dengan Greenhouse</h3>
        <p>Untuk lahan terbatas, <span class="highlight-keyword">greenhouse smart system</span> dengan pengatur suhu otomatis (optimal 25-30°C), LED grow light spektrum khusus, dan pengendalian kelembapan udara dapat memangkas waktu panen hingga <span class="highlight-keyword">20% lebih cepat</span>.</p>

        <div class="benefits-grid">
            <div class="benefit-item">
                <i class="fas fa-clock"></i>
                <span>Panen pertama 5-7 bulan</span>
            </div>
            <div class="benefit-item">
                <i class="fas fa-chart-line"></i>
                <span>Produktivitas +40-60%</span>
            </div>
            <div class="benefit-item">
                <i class="fas fa-leaf"></i>
                <span>Kualitas buah lebih seragam</span>
            </div>
            <div class="benefit-item">
                <i class="fas fa-tint"></i>
                <span>Penghematan air & pupuk</span>
            </div>
        </div>

        <h3 class="sub-title">Tips Tambahan</h3>
        <ul>
            <li>Lakukan <span class="highlight-keyword">pemangkasan tunas samping</span> secara rutin</li>
            <li>Gunakan <span class="highlight-keyword">drone multispektral</span> untuk pemantauan</li>
            <li>Aplikasikan <span class="highlight-keyword">pupuk daun</span> mengandung Zn dan Bo saat pembungaan</li>
        </ul>

        <div class="highlight-box">
            <p><strong>Ingin menerapkan teknik ini di kebun Anda?</strong> Dengan kombinasi teknologi tepat guna, petani pepaya kini bisa <span class="highlight-keyword">mendapatkan 3 siklus panen dalam 2 tahun</span>. Hubungi tim ahli smart farming kami untuk konsultasi gratis!</p>
        </div>
    </div>
</div>

@endsection
