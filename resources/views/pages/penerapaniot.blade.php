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
</style>

<div class="glass-card">
    <h1 class="article-title">Penerapan IoT dalam Pertanian</h1>
    
    <img src="{{ asset('image/sensor.png') }}" alt="Smart Farming dengan IoT" class="article-image">
    
    <div class="article-content">
        <p>Teknologi <span class="highlight-keyword">Internet of Things (IoT)</span> telah membawa revolusi besar di berbagai sektor, termasuk pertanian. Dalam konsep <span class="highlight-keyword">smart farming</span>, IoT memungkinkan petani memantau dan mengelola lahan secara real-time melalui sensor dan perangkat yang terhubung ke internet. Data seperti kelembapan tanah, suhu udara, intensitas cahaya, dan kondisi tanaman dapat dikumpulkan secara otomatis, membantu petani mengambil keputusan lebih cepat dan akurat. Dengan demikian, IoT tidak hanya meningkatkan produktivitas tetapi juga mengurangi pemborosan sumber daya.</p>

        <div class="highlight-box">
            <p>Salah satu penerapan IoT dalam pertanian adalah <span class="highlight-keyword">penggunaan sensor tanah dan cuaca</span>. Sensor-sensor ini ditempatkan di berbagai titik di lahan untuk mengumpulkan data tentang kondisi lingkungan. Informasi tersebut kemudian dikirim ke platform cloud untuk dianalisis, memberikan rekomendasi tentang jadwal irigasi, pemupukan, atau pemberantasan hama.</p>
        </div>

        <p>Selain itu, IoT juga memungkinkan <span class="highlight-keyword">monitoring ternak dan tanaman secara real-time</span>. Peternak dapat melacak kesehatan hewan melalui sensor yang dipasang pada collar atau tag, sementara petani bisa memantau pertumbuhan tanaman menggunakan drone atau kamera cerdas. Data seperti deteksi penyakit, pertumbuhan abnormal, atau kebutuhan nutrisi dapat diidentifikasi sejak dini, mencegah kerugian besar.</p>

        <p>Keuntungan lain dari IoT dalam pertanian adalah <span class="highlight-keyword">optimasi penggunaan sumber daya seperti air dan pupuk</span>. Sistem irigasi berbasis IoT hanya menyiram tanaman ketika dibutuhkan, mengurangi pemborosan air hingga 30%. Begitu juga dengan pemupukan, di mana sensor nutrisi tanah dapat menentukan dosis tepat sehingga tidak terjadi over-fertilization yang merusak lingkungan.</p>

        <p>Di masa depan, integrasi IoT dengan <span class="highlight-keyword">kecerdasan buatan (AI)</span> dan <span class="highlight-keyword">big data</span> akan semakin memperkuat smart farming. Prediksi cuaca berbasis AI, robot penanam dan panen, serta sistem manajemen pertanian terpusat akan menjadi standar baru dalam industri pertanian. Dengan adopsi IoT, petani dapat meningkatkan hasil panen, mengurangi ketergantungan pada tenaga kerja manual, dan berkontribusi pada ketahanan pangan global.</p>
    </div>
</div>

@endsection
