@extends('main.layout')

@section('title', 'History Prediksi')

@section('container')
<div class="glass-card">
    <h1 class="welcome-title">History Prediksi Panen</h1>
    
    <div class="dashboard-section">
        @if($predictions->isEmpty())
            <p>Belum ada prediksi yang disimpan.</p>
        @else
            <table class="harvest-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Jenis Tanaman</th>
                        <th>Tanggal Prediksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($predictions as $prediction)
                    <tr>
                        <td>{{ $prediction->title }}</td>
                        <td>{{ $prediction->plant_type }}</td>
                        <td>
                            <a href="{{ route('history.show', $prediction->id) }}" class="btn-submit">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection