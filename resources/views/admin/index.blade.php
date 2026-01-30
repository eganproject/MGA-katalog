@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Dashboard Admin</h1>
    <p>Anda berhasil masuk.</p>

    <div style="display:flex; align-items:center; gap:12px; margin-top:18px;">
        <span class="muted">{{ auth()->user()->name ?? auth()->user()->email }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="danger">Keluar</button>
        </form>
    </div>
@endsection
