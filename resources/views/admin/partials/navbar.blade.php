<header class="topbar">
    <div class="search">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color:var(--muted);">
            <circle cx="11" cy="11" r="7"></circle>
            <line x1="16.65" y1="16.65" x2="21" y2="21"></line>
        </svg>
        <input type="text" placeholder="Cari modul atau data..." aria-label="Pencarian">
    </div>
    <button class="pill-btn">Buat Laporan</button>
    <div class="user">
        <div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A',0,2)) }}</div>
        <div>
            <div style="font-weight:700;">{{ auth()->user()->name ?? 'Admin' }}</div>
            <div class="muted" style="font-size:12px;">{{ auth()->user()->email ?? 'admin@example.com' }}</div>
        </div>
        <form method="POST" action="{{ route('logout') }}" style="margin-left:10px;">
            @csrf
            <button class="pill-btn" style="padding:8px 12px;background:linear-gradient(135deg,#ef4444,#f97316);box-shadow:none;color:#fff;">Keluar</button>
        </form>
    </div>
</header>
