@extends('layouts.admin')

@section('content')
    <div class="flex flex-col gap-2">
        <p class="text-sm text-slate-400">Selamat datang kembali, {{ auth()->user()->name ?? 'Admin' }}</p>
        <h1 class="text-2xl font-semibold">Dashboard</h1>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl border border-slate-800 bg-slate-900/70 p-5 shadow-xl shadow-slate-900/50">
            <p class="text-sm text-slate-400">Pengguna Aktif</p>
            <div class="mt-2 flex items-end justify-between">
                <span class="text-3xl font-bold">1,284</span>
                <span class="text-emerald-400 text-sm font-semibold">▲ 12% vs minggu lalu</span>
            </div>
        </div>
        <div class="rounded-2xl border border-slate-800 bg-slate-900/70 p-5 shadow-xl shadow-slate-900/50">
            <p class="text-sm text-slate-400">Transaksi</p>
            <div class="mt-2 flex items-end justify-between">
                <span class="text-3xl font-bold">Rp 842 jt</span>
                <span class="text-emerald-400 text-sm font-semibold">▲ 6.3% MoM</span>
            </div>
        </div>
        <div class="rounded-2xl border border-slate-800 bg-slate-900/70 p-5 shadow-xl shadow-slate-900/50">
            <p class="text-sm text-slate-400">Ticket Support</p>
            <div class="mt-2 flex items-end justify-between">
                <span class="text-3xl font-bold">32</span>
                <span class="text-rose-400 text-sm font-semibold">▼ 4 ticket</span>
            </div>
        </div>
    </div>

    <div class="grid gap-4 lg:grid-cols-2">
        <div class="rounded-2xl border border-slate-800 bg-slate-900/70 p-5 shadow-xl shadow-slate-900/50">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold">Aktivitas Terbaru</h3>
                    <p class="text-xs text-slate-500">24h terakhir</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="text-slate-400">
                        <tr class="border-b border-slate-800">
                            <th class="py-2 pr-4 text-left">Waktu</th>
                            <th class="py-2 pr-4 text-left">Pengguna</th>
                            <th class="py-2 pr-4 text-left">Aksi</th>
                            <th class="py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        <tr>
                            <td class="py-2 pr-4">09:24</td>
                            <td class="py-2 pr-4">Rani Pratama</td>
                            <td class="py-2 pr-4 text-slate-300">Upload dokumen kontrak</td>
                            <td class="py-2">
                                <span class="rounded-full bg-emerald-500/20 px-3 py-1 text-xs font-semibold text-emerald-300">Sukses</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4">08:51</td>
                            <td class="py-2 pr-4">Andi Putra</td>
                            <td class="py-2 pr-4 text-slate-300">Update profil perusahaan</td>
                            <td class="py-2">
                                <span class="rounded-full bg-blue-500/20 px-3 py-1 text-xs font-semibold text-blue-200">Diproses</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4">08:10</td>
                            <td class="py-2 pr-4">Dewi Lestari</td>
                            <td class="py-2 pr-4 text-slate-300">Membuat tiket support</td>
                            <td class="py-2">
                                <span class="rounded-full bg-amber-500/20 px-3 py-1 text-xs font-semibold text-amber-200">Menunggu</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4">07:42</td>
                            <td class="py-2 pr-4">Rudi Hartono</td>
                            <td class="py-2 pr-4 text-slate-300">Menambah user baru</td>
                            <td class="py-2">
                                <span class="rounded-full bg-emerald-500/20 px-3 py-1 text-xs font-semibold text-emerald-300">Sukses</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-800 bg-slate-900/70 p-5 shadow-xl shadow-slate-900/50">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold">Quick Actions</h3>
                    <p class="text-xs text-slate-500">Shortcut harian</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                @foreach(['Tambah User','Unggah Dokumen','Buat Invoice','Export CSV','Setel Notifikasi','Mode Audit'] as $action)
                    <button class="rounded-xl border border-slate-800 bg-slate-800/70 px-3 py-2 text-sm font-semibold text-slate-100 hover:border-sky-500/60 hover:text-white transition">
                        {{ $action }}
                    </button>
                @endforeach
            </div>
            <p class="mt-4 text-sm text-slate-400">Gunakan aksi cepat untuk mempercepat pekerjaan rutin Anda.</p>
        </div>
    </div>
@endsection
