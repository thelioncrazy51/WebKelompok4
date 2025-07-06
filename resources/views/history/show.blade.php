<!-- resources/views/history/show.blade.php -->
@extends('main.layout')

@section('title', 'Detail Prediksi')

@section('container')
<div class="glass-card">
    <h1 class="welcome-title">Detail Prediksi Panen</h1>
    
    <div class="dashboard-section">
        <div class="result-card">
            <h3 class="result-title">{{ $prediction->title }}</h3>
            <div class="result-value">
                <p><strong>Tanggal Prediksi:</strong> {{ $prediction->prediction_date->format('d M Y H:i') }}</p>
                <p><strong>Lokasi:</strong> {{ $prediction->location }}</p>
                <p><strong>Jenis Tanaman:</strong> {{ $prediction->plant_type }}</p>
                <p><strong>Kondisi Tanah:</strong> {{ $prediction->soil_condition }}</p>
                <p><strong>Perkiraan Waktu Panen:</strong> {{ $prediction->harvest_time }}</p>
            </div>
            
            <h4 class="section-title">Rencana Perawatan Tanaman</h4>
            <div class="table-responsive">
                <table class="harvest-table">
                    <thead>
                        <tr>
                            <th>Hari Ke-</th>
                            <th>Kegiatan</th>
                            <th>Kondisi Ideal</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(json_decode($prediction->care_plan, true) as $care)
                        <tr>
                            <td>{{ $care['day'] }}</td>
                            <td>{{ $care['activity'] }}</td>
                            <td>{{ $care['condition'] }}</td>
                            <td>{{ $care['note'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection