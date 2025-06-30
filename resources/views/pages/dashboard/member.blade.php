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

    <h1>Welcome, Member!</h1>
    @auth
    <p>Email: {{ Auth::user()->email }}</p>
    <a href="{{ route('logout') }}">Logout</a>
    @endauth

