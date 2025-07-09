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

    
    
</div>

@endsection
