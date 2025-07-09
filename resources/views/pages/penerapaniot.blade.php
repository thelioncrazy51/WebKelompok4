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
        max-height: 400px;
        object-fit: cover;
    }
    .highlight-box {
        background: rgba(20, 82, 20, 0.1);
        border-left: 4px solid #145214;
        padding: 1.5rem;
        border-radius: 0 8px 8px 0;
        margin: 1.5rem 0;
    }
</style>

<div class="glass-card">
    <h1 class="article-title">Penerapan IoT dalam Pertanian</h1>
    
    <div class="article-content">
        <p>Teknologi <strong>Internet of Things (IoT)</strong> telah membawa revolusi besar dalam sektor pertanian modern, atau yang dikenal sebagai <strong>Smart Farming</strong>. Dengan menggunakan sensor, perangkat pintar, dan konektivitas internet, petani dapat memantau kondisi lahan secara real-time, seperti kelembapan tanah, suhu udara, dan kadar pupuk. Data yang terkumpul kemudian dianalisis untuk mengambil keputusan lebih akurat, seperti menentukan waktu penyiraman atau pemberian pestisida. Hal ini tidak hanya meningkatkan efisiensi, tetapi juga mengurangi pemborosan sumber daya.</p>

        <div class="highlight-box">
            <p>IoT memungkinkan <strong>otomatisasi proses pertanian</strong>, seperti sistem irigasi cerdas yang dapat menyiram tanaman berdasarkan kebutuhan airnya. Alat seperti drone dan robot pertanian dilengkapi dengan sensor IoT untuk memantau pertumbuhan tanaman, mendeteksi hama, atau bahkan memanen hasil pertanian.</p>
        </div>

        <p>Ke depan, penerapan IoT dalam pertanian akan semakin berkembang dengan integrasi <strong>kecerdasan buatan (AI)</strong> dan <strong>big data</strong>. Sistem peringatan dini berbasis IoT dapat memprediksi cuaca ekstrem atau serangan hama, membantu petani mengambil tindakan preventif. Dengan demikian, IoT tidak hanya mendorong pertanian yang lebih presisi dan berkelanjutan, tetapi juga membuka peluang bagi petani untuk bersaing di era digital. <strong>Smart Farming</strong> dengan IoT adalah solusi menjawab tantangan ketahanan pangan di masa depan.</p>
    </div>
</div>

@endsection
