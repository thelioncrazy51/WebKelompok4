@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(to right, #e0f7fa, #e8f5e9);')

@section('container')
<section class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="fw-bold text-success" style="font-size: 3rem;">
                Solusi Cerdas untuk Pertanian Masa Depan 🌱
            </h1>
            <p class="fs-5 text-secondary">
                Smart Farming menghadirkan teknologi terkini untuk meningkatkan hasil panen, efisiensi energi,
                dan keberlanjutan lingkungan. Dengan sistem otomatisasi, sensor tanah, serta pengawasan berbasis
                data, kami bantu petani menghadapi tantangan pertanian modern.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('image/sm2.jpg') }}" alt="Smart Farming"
                class="img-fluid rounded-4 shadow border border-success" style="max-width: 420px;">
        </div>
    </div>
</section>
@endsection
