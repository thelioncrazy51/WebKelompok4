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
    .sub-title {
        color: #145214;
        font-weight: 600;
        font-size: 1.3rem;
        margin: 1.5rem 0 1rem 0;
    }
</style>

<div class="glass-card">
    <h1 class="article-title">Mengapa Smart Farming Itu Penting?</h1>
    
    <img src="{{ asset('image/ketahanan.png') }}" alt="Mengapa Smart Farming Itu Penting?" class="article-image">

    <div class="article-content">
        <p>Pertanian konvensional menghadapi berbagai tantangan seperti perubahan iklim, kelangkaan sumber daya, dan peningkatan permintaan pangan global. <span class="highlight-keyword">Smart farming</span> hadir sebagai solusi berbasis teknologi yang mengubah paradigma budidaya tradisional menjadi sistem pertanian <span class="highlight-keyword">presisi, efisien, dan berkelanjutan</span>.</p>

        <h3 class="sub-title">1. Efisiensi Sumber Daya yang Optimal</h3>
        <p>Smart farming memanfaatkan <span class="highlight-keyword">sensor IoT, drone, dan AI</span> untuk:</p>
        <ul>
            <li>Mengurangi penggunaan air hingga <span class="highlight-keyword">30-50%</span> melalui irigasi presisi</li>
            <li>Meminimalkan limbah pupuk dengan aplikasi berbasis data real-time</li>
            <li>Mengoptimalkan tenaga kerja manusia dengan otomatisasi</li>
        </ul>

        <h3 class="sub-title">2. Peningkatan Produktivitas & Kualitas Hasil</h3>
        <p>Data dari FAO menunjukkan bahwa smart farming dapat:</p>
        <div class="benefits-grid">
            <div class="benefit-item">
                <i class="fas fa-chart-line"></i>
                <span>Meningkatkan hasil panen 20-40%</span>
            </div>
            <div class="benefit-item">
                <i class="fas fa-bug"></i>
                <span>Menekan kehilangan hasil akibat hama hingga 25%</span>
            </div>
        </div>

        <div class="highlight-box">
            <p>Contoh nyata: Petani bawang di Brebes berhasil meningkatkan produktivitas <span class="highlight-keyword">35%</span> setelah menerapkan sistem monitoring tanah berbasis IoT.</p>
        </div>

        <h3 class="sub-title">3. Adaptasi terhadap Perubahan Iklim</h3>
        <p>Smart farming dilengkapi dengan:</p>
        <ul>
            <li><span class="highlight-keyword">Prediksi cuaca hiper-lokal</span> berbasis AI</li>
            <li>Sistem peringatan dini kekeringan atau banjir</li>
            <li>Teknik budidaya hemat air seperti hidroponik otomatis</li>
        </ul>

        <h3 class="sub-title">Manfaat Smart Farming untuk Berbagai Stakeholder</h3>
        <table class="stakeholder-table">
            <thead>
                <tr>
                    <th>Stakeholder</th>
                    <th>Manfaat Utama</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Petani kecil</td>
                    <td>Akses teknologi terjangkau, peningkatan pendapatan</td>
                </tr>
                <tr>
                    <td>Agribisnis besar</td>
                    <td>Skalabilitas operasi, kontrol kualitas terpusat</td>
                </tr>
                <tr>
                    <td>Pemerintah</td>
                    <td>Ketahanan pangan nasional, data pertanian akurat</td>
                </tr>
                <tr>
                    <td>Konsumen</td>
                    <td>Produk lebih sehat, transparansi sumber bahan</td>
                </tr>
            </tbody>
        </table>

        <div class="quote-box">
            <p>"Smart farming bukan sekadar pilihan, tapi kebutuhan untuk memastikan ketahanan pangan di tengah pertumbuhan populasi global yang pesat."</p>
            <p>- Dr. Ani Widayati, Pakar Agritech IPB</p>
        </div>

        <h3 class="sub-title">Mulai Transisi Anda Sekarang!</h3>
        <p>Smart farming dapat dimulai secara bertahap:</p>
        <ol>
            <li>Gunakan <span class="highlight-keyword">sensor kelembapan tanah</span> sederhana</li>
            <li>Adopsi <span class="highlight-keyword">aplikasi pemantauan tanaman</span></li>
            <li>Ikuti <span class="highlight-keyword">pelatihan teknologi pertanian</span></li>
        </ol>

        <div class="highlight-box">
            <p>Dengan smart farming, kita tidak hanya meningkatkan hasil panen hari ini, tapi juga <span class="highlight-keyword">memastikan keberlanjutan pertanian untuk generasi mendatang</span>.</p>
        </div>
    </div>
</div>

@endsection
