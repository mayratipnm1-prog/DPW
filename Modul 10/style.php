<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --bg:        #F5F5F0;
    --surface:   #FFFFFF;
    --border:    #E4E4DC;
    --accent:    #1A56DB;
    --accent-lt: #EEF2FF;
    --text:      #18181B;
    --muted:     #71717A;
    --danger:    #DC2626;
    --success:   #16A34A;
    --warn:      #D97706;
    --radius:    8px;
    --shadow:    0 1px 3px rgba(0,0,0,.08), 0 4px 16px rgba(0,0,0,.06);
  }

  body {
    font-family: 'Inter', sans-serif;
    background: var(--bg);
    color: var(--text);
    min-height: 100vh;
    padding: 2.5rem 1.5rem;
    font-size: 15px;
    line-height: 1.6;
  }

  .page-header { max-width: 900px; margin: 0 auto 2rem; }
  .page-header h1 { font-size: 1.5rem; font-weight: 600; letter-spacing: -.02em; margin-bottom: .25rem; }
  .page-header p  { font-size: 13px; color: var(--muted); }
  .page-header .breadcrumb { font-size: 12px; color: var(--muted); margin-bottom: .75rem; }
  .page-header .breadcrumb span { color: var(--accent); }

  .container { max-width: 900px; margin: 0 auto; }
  .grid-2 { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1rem; }
  .grid-3 { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; }

  .card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    overflow: hidden;
  }
  .card-header {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .card-header h3 { font-size: 14px; font-weight: 600; color: var(--text); }
  .card-header .tag {
    font-size: 11px;
    font-weight: 500;
    padding: 2px 8px;
    border-radius: 20px;
    background: var(--accent-lt);
    color: var(--accent);
  }
  .card-body { padding: 1.25rem; }
  .data-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
  .data-table th, .data-table td { padding: 9px 12px; text-align: left; border-bottom: 1px solid var(--border); }
  .data-table th { font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: .05em; color: var(--muted); background: var(--bg); }
  .data-table td:first-child { color: var(--muted); width: 38%; }
  .data-table tr:last-child td { border-bottom: none; }

  .badge { display: inline-block; font-size: 11px; font-weight: 500; padding: 2px 8px; border-radius: 4px; }
  .badge-blue  { background: var(--accent-lt); color: var(--accent); }
  .badge-green { background: #DCFCE7; color: var(--success); }
  .badge-red   { background: #FEE2E2; color: var(--danger); }
  .badge-amber { background: #FEF3C7; color: var(--warn); }
  .badge-gray  { background: #F4F4F5; color: var(--muted); }

  .note-box {
    background: #FAFAF8;
    border: 1px solid var(--border);
    border-left: 3px solid var(--accent);
    border-radius: var(--radius);
    padding: 1rem 1.25rem;
    font-size: 13px;
    color: #3F3F46;
    line-height: 1.75;
    margin-top: 1rem;
  }
  .note-box.warn  { border-left-color: var(--warn);    background: #FFFBEB; }
  .note-box.ok    { border-left-color: var(--success); background: #F0FDF4; }
  .note-box.error { border-left-color: var(--danger);  background: #FEF2F2; }

  .note-box h4 { font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: .05em; margin-bottom: .5rem; }

  code {
    font-family: 'DM Mono', 'Fira Code', monospace;
    font-size: 12px;
    background: #F4F4F5;
    padding: 1px 5px;
    border-radius: 3px;
    color: #52525B;
  }

  .divider { border: none; border-top: 1px solid var(--border); margin: 1.5rem 0; }

  .tx-plus  td:last-child { color: var(--success); font-weight: 500; }
  .tx-minus td:last-child { color: var(--danger);  font-weight: 500; }
  .tx-tax   td:last-child { color: var(--warn);    font-weight: 500; }
  .tx-bold  td            { font-weight: 600; }
</style>
