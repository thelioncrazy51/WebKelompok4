@extends('main.layout')

@section('body-attr', 'style=background-color:#F5F9F6;')

@section('container')
<section class="container py-5">
    <h2 class="text-center fw-bold mb-4" style="color: #28a745; font-size: 36px;">
        Hasil Panen Unggulan Kami
    </h2>
    <p class="text-center text-muted mb-5" style="font-size: 16px;">
        Kami menjual produk hasil pertanian dari sistem Smart Farming berbasis teknologi dan presisi tinggi.
    </p>

    <div class="row justify-content-center g-4">
        <!-- Produk 1 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center rounded-4">
                <img src="{{ asset('image/pepaya.jpg') }}" alt="Pepaya California" class="card-img-top p-4" style="height: 220px; object-fit: contain;">
                <div class="card-body">
                    <h5 class="fw-bold text-success">Pepaya California</h5>
                    <p class="text-muted small">Manis, segar, kaya nutrisi. Dipanen langsung dari kebun kami.</p>
                    <a href="#" class="btn btn-success btn-sm rounded-pill px-4">Beli Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Produk 2 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center rounded-4">
                <img src="{{ asset('image/beras.jpg') }}" alt="Beras Organik" class="card-img-top p-4" style="height: 220px; object-fit: contain;">
                <div class="card-body">
                    <h5 class="fw-bold text-primary">Beras Organik</h5>
                    <p class="text-muted small">Beras sehat tanpa pestisida. Aman untuk semua usia.</p>
                    <a href="#" class="btn btn-primary btn-sm rounded-pill px-4">Beli Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Produk 3 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center rounded-4">
                <img src="{{ asset('image/kopi.jpg') }}" alt="Kopi Arabika" class="card-img-top p-4" style="height: 220px; object-fit: contain;">
                <div class="card-body">
                    <h5 class="fw-bold text-warning">Kopi Arabika</h5>
                    <p class="text-muted small">Aroma khas dari dataran tinggi. Dipetik dan diproses alami.</p>
                    <a href="#" class="btn btn-warning btn-sm rounded-pill px-4">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


