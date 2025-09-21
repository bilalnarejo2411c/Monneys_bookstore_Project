<!doctype html>
<html lang="ur" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Simple Dashboard</title>
  <style>
    :root{
      --bg:#0f1724; --card:#0b1220; --muted:#9aa4b2; --accent:#4f46e5; --accent-2:#06b6d4;
      --glass: rgba(255,255,255,0.03);
      --round:12px;
      --gap:18px;
      color-scheme: dark;
    }
    *{box-sizing:border-box}
    body{margin:0;font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, 'Noto Sans', 'Helvetica Neue', Arial; background:linear-gradient(180deg,#071021 0%, #071827 100%); color:#e6eef6}

    /* layout */
    .app{display:grid;grid-template-columns:260px 1fr;min-height:100vh;gap:var(--gap);}
    .sidebar{background:linear-gradient(180deg,var(--card), rgba(6,9,14,0.6));padding:22px;border-right:1px solid rgba(255,255,255,0.03)}
    .brand{display:flex;align-items:center;gap:12px;margin-bottom:18px}
    .logo{width:44px;height:44px;background:linear-gradient(135deg,var(--accent),var(--accent-2));border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700}
    .brand h1{font-size:16px;margin:0}
    nav ul{list-style:none;padding:0;margin:18px 0}
    nav a{display:flex;gap:12px;align-items:center;padding:10px;border-radius:10px;color:var(--muted);text-decoration:none}
    nav a:hover{background:var(--glass);color:#fff}

    .main{padding:22px}
    .topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:22px}
    .search{background:var(--glass);padding:10px 12px;border-radius:10px;display:flex;gap:10px;align-items:center}
    input{background:transparent;border:0;color:inherit;outline:0}
    .profile{display:flex;gap:12px;align-items:center}
    .avatar{width:40px;height:40px;border-radius:10px;background:linear-gradient(180deg,#1f2937,#111827);display:flex;align-items:center;justify-content:center}

    /* cards grid */
    .grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:18px}
    .card{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));padding:16px;border-radius:12px;border:1px solid rgba(255,255,255,0.03)}
    .card h3{margin:0;font-size:13px;color:var(--muted)}
    .card p{margin:8px 0 0;font-size:20px;font-weight:700}

    /* responsive */
    @media (max-width:980px){ .app{grid-template-columns:1fr} .sidebar{display:none} .grid{grid-template-columns:repeat(2,1fr)} }
    @media (max-width:520px){ .grid{grid-template-columns:1fr} }

    /* larger sections */
    .panel{display:grid;grid-template-columns:2fr 1fr;gap:16px}
    .table{overflow:auto}
    table{width:100%;border-collapse:collapse}
    th,td{padding:12px;text-align:left;border-bottom:1px solid rgba(255,255,255,0.03);font-size:14px}
    th{color:var(--muted);font-weight:600}

    /* small chart (CSS bars) */
    .chart{display:flex;align-items:end;gap:8px;height:120px;padding:12px}
    .bar{width:18px;border-radius:6px 6px 0 0;background:linear-gradient(180deg,var(--accent),var(--accent-2));display:flex;align-items:end;justify-content:center}
    .bar span{font-size:12px;padding-bottom:6px}

    footer{margin-top:16px;color:var(--muted);font-size:13px}

    /* RTL / Urdu tweaks: keep text-right for labels */
    :lang(ur){direction:rtl}
    :lang(ur) nav a{justify-content:flex-end}
  </style>
</head>
<body>
  <div class="app">
    <aside class="sidebar" aria-label="Sidebar">
      <div class="brand">
        <div class="logo">A</div>
        <div>
          <h1>Admin Panel</h1>
          <div style="font-size:12px;color:var(--muted)">Muhammad Anwar</div>
        </div>
      </div>
      <nav>
        <ul>
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Users</a></li>
          <li><a href="#">Transactions</a></li>
          <li><a href="#">Settings</a></li>
        </ul>
      </nav>
      <div style="margin-top:18px;color:var(--muted);font-size:13px">Shortcuts</div>
      <div style="display:flex;gap:8px;margin-top:10px">
        <button style="flex:1;padding:10px;border-radius:8px;border:0;background:var(--glass)">New</button>
        <button style="flex:1;padding:10px;border-radius:8px;border:0;background:var(--glass)">Export</button>
      </div>
    </aside>

    <main class="main">
      <div class="topbar">
        <div class="search" role="search">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden><path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <input placeholder="Search..." />
        </div>
        <div class="profile">
          <div style="text-align:right">
            <div style="font-weight:700">Admin</div>
            <div style="font-size:13px;color:var(--muted)">Online</div>
          </div>
          <div class="avatar">M</div>
        </div>
      </div>

      <section class="grid" aria-label="Summary cards">
        <div class="card"><h3>Active Users</h3><p>1,248</p></div>
        <div class="card"><h3>New Signups</h3><p>82</p></div>
        <div class="card"><h3>Revenue</h3><p>Rs 124,800</p></div>
        <div class="card"><h3>Pending</h3><p>12</p></div>
      </section>

      <section class="panel">
        <div class="card" style="min-height:260px">
          <h3 style="margin-bottom:6px">Monthly Active</h3>
          <div style="font-size:13px;color:var(--muted);margin-bottom:10px">Visitors this month</div>
          <div class="chart" aria-hidden>
            <div class="bar" style="height:40%"><span>40</span></div>
            <div class="bar" style="height:55%"><span>55</span></div>
            <div class="bar" style="height:70%"><span>70</span></div>
            <div class="bar" style="height:60%"><span>60</span></div>
            <div class="bar" style="height:85%"><span>85</span></div>
            <div class="bar" style="height:45%"><span>45</span></div>
            <div class="bar" style="height:75%"><span>75</span></div>
          </div>
          <footer>Updated: Today</footer>
        </div>

        <div class="card">
          <h3>Recent Transactions</h3>
          <div class="table">
            <table>
              <thead><tr><th>Txn ID</th><th>نام</th><th>رقم</th><th>حالت</th></tr></thead>
              <tbody>
                <tr><td>#1456</td><td>Ali</td><td>Rs 2,400</td><td>Completed</td></tr>
                <tr><td>#1455</td><td>Sara</td><td>Rs 1,200</td><td>Pending</td></tr>
                <tr><td>#1454</td><td>Bilal</td><td>Rs 3,500</td><td>Completed</td></tr>
              </tbody>
            </table>
          </div>
          <footer style="text-align:right">View all</footer>
        </div>
      </section>

    </main>
  </div>
</body>
</html>