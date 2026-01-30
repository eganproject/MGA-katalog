<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    <style>
        :root {
            --bg: #0f172a;
            --panel: #0b1220;
            --panel-2: #11192b;
            --panel-3: #1b2438;
            --primary: #38bdf8;
            --primary-2: #c084fc;
            --text: #e2e8f0;
            --muted: #94a3b8;
            --success: #22c55e;
            --warning: #f59e0b;
            --danger: #ef4444;
            --radius: 14px;
            --shadow: 0 25px 70px rgba(0, 0, 0, 0.35);
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: radial-gradient(circle at 15% 20%, rgba(56,189,248,0.12), transparent 32%),
                        radial-gradient(circle at 90% 0%, rgba(192,132,252,0.16), transparent 30%),
                        var(--bg);
            color: var(--text);
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            min-height: 100vh;
        }
        a { color: inherit; text-decoration: none; }
        .layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
        }
        .sidebar {
            position: sticky;
            top: 0;
            align-self: start;
            height: 100vh;
            background: linear-gradient(180deg, var(--panel), var(--panel-2));
            border-right: 1px solid rgba(255,255,255,0.04);
            padding: 22px 18px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            box-shadow: inset -1px 0 0 rgba(255,255,255,0.02);
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 10px;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(56,189,248,0.14), rgba(192,132,252,0.12));
            border: 1px solid rgba(255,255,255,0.06);
            font-weight: 700;
            letter-spacing: -0.01em;
        }
        .brand .badge {
            background: rgba(56,189,248,0.25);
            color: #0f172a;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }
        .nav {
            display: grid;
            gap: 6px;
        }
        .nav a {
            padding: 12px 12px;
            border-radius: 12px;
            color: var(--muted);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 120ms ease, color 120ms ease, transform 120ms ease;
        }
        .nav a:hover { color: var(--text); background: rgba(255,255,255,0.04); transform: translateX(2px); }
        .nav a.active { color: var(--text); background: rgba(56,189,248,0.10); border: 1px solid rgba(56,189,248,0.25); }
        .nav small { color: var(--muted); font-size: 12px; letter-spacing: 0.04em; text-transform: uppercase; padding: 8px 4px 2px; }
        .chip {
            margin-top: auto;
            padding: 12px 14px;
            border-radius: 12px;
            background: rgba(255,255,255,0.04);
            color: var(--muted);
            font-size: 14px;
        }
        .main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: linear-gradient(180deg, rgba(255,255,255,0.02), transparent 48%), var(--bg);
        }
        .topbar {
            position: sticky;
            top: 0;
            z-index: 10;
            backdrop-filter: blur(14px);
            background: rgba(12,18,32,0.72);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 24px;
        }
        .search {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 12px;
            padding: 10px 12px;
        }
        .search input {
            flex: 1;
            border: none;
            background: transparent;
            color: var(--text);
            outline: none;
            font-size: 14px;
        }
        .pill-btn {
            border: none;
            cursor: pointer;
            padding: 10px 14px;
            border-radius: 12px;
            font-weight: 700;
            color: #0b1224;
            background: linear-gradient(135deg, var(--primary), #3b82f6);
            box-shadow: 0 12px 30px rgba(56,189,248,0.25);
            transition: transform 120ms ease, box-shadow 120ms ease;
        }
        .pill-btn:hover { transform: translateY(-1px); }
        .user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 10px;
            border-radius: 12px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.06);
        }
        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            display: grid;
            place-items: center;
            font-weight: 800;
            color: #0b1224;
        }
        .content {
            padding: 22px 24px 32px;
            flex: 1;
            display: grid;
            gap: 18px;
        }
        .page-title { margin: 0; letter-spacing: -0.03em; }
        .muted { color: var(--muted); }
        .grid {
            display: grid;
            gap: 16px;
        }
        .grid-3 { grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); }
        .grid-2 { grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }
        .card {
            background: linear-gradient(145deg, var(--panel), var(--panel-2));
            border-radius: var(--radius);
            padding: 18px;
            border: 1px solid rgba(255,255,255,0.04);
            box-shadow: var(--shadow);
        }
        .card h3 { margin: 0 0 6px; }
        .stat-value { font-size: 32px; font-weight: 800; letter-spacing: -0.02em; }
        .trend { display: inline-flex; align-items: center; gap: 6px; font-weight: 700; }
        .trend.up { color: var(--success); }
        .trend.down { color: var(--danger); }
        .table {
            width: 100%;
            border-spacing: 0;
            color: var(--muted);
        }
        .table th, .table td { padding: 10px 8px; text-align: left; }
        .table th { color: var(--text); font-size: 13px; letter-spacing: 0.02em; }
        .table tr { border-bottom: 1px solid rgba(255,255,255,0.05); }
        .tag { display: inline-flex; align-items: center; padding: 6px 10px; border-radius: 999px; font-size: 12px; font-weight: 700; }
        .tag.success { background: rgba(34,197,94,0.15); color: #bbf7d0; }
        .tag.warning { background: rgba(245,158,11,0.15); color: #fcd34d; }
        .tag.info { background: rgba(59,130,246,0.18); color: #bfdbfe; }
        footer { padding: 14px 24px 22px; border-top: 1px solid rgba(255,255,255,0.06); color: var(--muted); font-size: 14px; }
        .quick-actions { display: flex; flex-wrap: wrap; gap: 10px; }
        .quick-actions button {
            background: rgba(255,255,255,0.05);
            color: var(--text);
            border: 1px solid rgba(255,255,255,0.06);
            padding: 10px 12px;
            border-radius: 12px;
            cursor: pointer;
            transition: border-color 120ms ease, transform 120ms ease;
        }
        .quick-actions button:hover { border-color: rgba(56,189,248,0.35); transform: translateY(-1px); }
        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }
        @media (max-width: 1080px) {
            .layout { grid-template-columns: 1fr; }
            .sidebar { position: relative; height: auto; flex-direction: row; align-items: center; flex-wrap: wrap; }
            .brand { width: 100%; }
            .nav { grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); width: 100%; }
        }
    </style>
</head>
<body>
    <div class="layout">
        @include('admin.partials.sidebar')

        <div class="main">
            @include('admin.partials.navbar')

            <main class="content">
                @yield('content')
            </main>

            @include('admin.partials.footer')
        </div>
    </div>

    @stack('scripts')
</body>
</html>
