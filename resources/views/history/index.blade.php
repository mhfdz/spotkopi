@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 800px;">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h2 class="fw-bold m-0" style="color: #111; letter-spacing: -0.5px;">Riwayat Pencarian</h2>
            <p class="text-muted m-0">Jejak eksplorasi tempat nugasmu.</p>
        </div>
        @if($histories->isNotEmpty())
            <form action="{{ route('riwayat.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">Bersihkan Riwayat</button>
            </form>
        @endif
    </div>

    @if($histories->isEmpty())
        <div class="text-center text-muted py-5" style="background: #fff; border-radius: 8px; border: 1px dashed #ccc;">
            <div style="font-size: 40px; margin-bottom: 10px;">🕒</div>
            <p class="m-0">Belum ada riwayat pencarian.</p>
        </div>
    @else
        <div class="list-group shadow-sm">
            @foreach($histories as $history)
                <a href="/?search={{ urlencode($history->keyword) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 border-0 border-bottom">
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-muted">🔍</span>
                        <span class="fw-semibold" style="color: #333;">{{ $history->keyword }}</span>
                    </div>
                    <small class="text-muted">{{ $history->created_at->diffForHumans() }}</small>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection