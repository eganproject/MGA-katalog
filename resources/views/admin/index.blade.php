@extends('layouts.admin')

@section('content')
    <div class="grid grid-3">
        <div class="card">
            <h3>Pengguna Aktif</h3>
            <div class="stat-value">1,284</div>
            <div class="trend up">▲ 12% vs minggu lalu</div>
        </div>
        <div class="card">
            <h3>Transaksi</h3>
            <div class="stat-value">Rp 842 jt</div>
            <div class="trend up">▲ 6.3% MoM</div>
        </div>
        <div class="card">
            <h3>Ticket Support</h3>
            <div class="stat-value">32</div>
            <div class="trend down">▼ 4 ticket</div>
        </div>
    </div>

    <div class="grid grid-2">
        <div class="card">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
                <h3 class="page-title">Aktivitas Terbaru</h3>
                <span class="muted">24h terakhir</span>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Pengguna</th>
                        <th>Aksi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>09:24</td>
                        <td>Rani Pratama</td>
                        <td>Upload dokumen kontrak</td>
                        <td><span class="tag success">Sukses</span></td>
                    </tr>
                    <tr>
                        <td>08:51</td>
                        <td>Andi Putra</td>
                        <td>Update profil perusahaan</td>
                        <td><span class="tag info">Diproses</span></td>
                    </tr>
                    <tr>
                        <td>08:10</td>
                        <td>Dewi Lestari</td>
                        <td>Membuat tiket support</td>
                        <td><span class="tag warning">Menunggu</span></td>
                    </tr>
                    <tr>
                        <td>07:42</td>
                        <td>Rudi Hartono</td>
                        <td>Menambah user baru</td>
                        <td><span class="tag success">Sukses</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
                <h3 class="page-title">Quick Actions</h3>
                <span class="muted">Shortcut harian</span>
            </div>
            <div class="quick-actions">
                <button>Tambah User</button>
                <button>Unggah Dokumen</button>
                <button>Buat Invoice</button>
                <button>Export CSV</button>
                <button>Setel Notifikasi</button>
                <button>Mode Audit</button>
            </div>
            <div style="margin-top:18px;" class="muted">Gunakan aksi cepat untuk mempercepat pekerjaan rutin Anda.</div>
        </div>
    </div>
@endsection
