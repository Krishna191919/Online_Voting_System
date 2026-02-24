<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nepal E-Voting System | निर्वाचन प्रणाली</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --crimson: #c0392b;
      --deep-red: #8b1a1a;
      --gold: #d4a017;
      --navy: #1a2744;
      --slate: #2c3e6b;
      --light: #f5f0e8;
      --white: #fff;
      --gray: #8a8a8a;
      --success: #27ae60;
      --border: #ddd5c0;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Source Sans 3', sans-serif;
      background: var(--light);
      color: var(--navy);
      min-height: 100vh;
    }

    /* HEADER */
    header {
      background: linear-gradient(135deg, var(--deep-red) 0%, var(--crimson) 50%, var(--deep-red) 100%);
      color: white;
      position: relative;
      overflow: hidden;
    }

    header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255, 255, 255, 0.03) 10px, rgba(255, 255, 255, 0.03) 20px);
    }

    .header-top {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
      padding: 24px 40px 16px;
      position: relative;
    }

    .nepal-emblem {
      width: 64px;
      height: 64px;
      background: var(--gold);
      clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
      flex-shrink: 0;
    }

    .header-text h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 900;
    }

    .header-text p {
      font-size: 0.9rem;
      opacity: 0.85;
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-top: 4px;
    }

    .header-bar {
      background: var(--navy);
      text-align: center;
      padding: 8px;
      font-size: 0.8rem;
      letter-spacing: 1px;
      color: var(--gold);
      text-transform: uppercase;
    }

    /* NAV TABS */
    .nav-tabs {
      display: flex;
      background: white;
      border-bottom: 2px solid var(--border);
      padding: 0 40px;
      gap: 0;
    }

    .nav-tab {
      padding: 14px 24px;
      font-weight: 700;
      font-size: 0.82rem;
      letter-spacing: 1px;
      text-transform: uppercase;
      cursor: pointer;
      border-bottom: 3px solid transparent;
      margin-bottom: -2px;
      color: var(--gray);
      transition: all 0.2s;
    }

    .nav-tab:hover {
      color: var(--crimson);
    }

    .nav-tab.active {
      color: var(--crimson);
      border-bottom-color: var(--crimson);
    }

    /* CONTAINER */
    .container {
      max-width: 900px;
      margin: 0 auto;
      padding: 40px 20px 60px;
    }

    /* PAGE */
    .page {
      display: none;
      animation: fadeUp 0.35s ease;
    }

    .page.active {
      display: block;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(14px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* STEPS */
    .steps-bar {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 36px;
    }

    .step {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
    }

    .step-num {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      border: 2px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 0.85rem;
      background: white;
      color: var(--gray);
      transition: all 0.3s;
    }

    .step.active .step-num {
      background: var(--crimson);
      border-color: var(--crimson);
      color: white;
    }

    .step.done .step-num {
      background: var(--success);
      border-color: var(--success);
      color: white;
    }

    .step-label {
      font-size: 0.72rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: var(--gray);
      font-weight: 600;
    }

    .step.active .step-label {
      color: var(--crimson);
    }

    .step.done .step-label {
      color: var(--success);
    }

    .step-line {
      height: 2px;
      width: 60px;
      background: var(--border);
      margin-bottom: 22px;
    }

    .step-line.done {
      background: var(--success);
    }

    /* CARD */
    .card {
      background: white;
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: 40px;
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.07);
      display: none;
      animation: fadeUp 0.4s ease;
    }

    .card.active {
      display: block;
    }

    .card-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--navy);
      margin-bottom: 6px;
    }

    .card-subtitle {
      color: var(--gray);
      font-size: 0.9rem;
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 1px solid var(--border);
    }

    /* FORM */
    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: 600;
      font-size: 0.85rem;
      letter-spacing: 0.5px;
      color: var(--navy);
      margin-bottom: 8px;
      text-transform: uppercase;
    }

    input {
      width: 100%;
      padding: 12px 16px;
      border: 1.5px solid var(--border);
      border-radius: 3px;
      font-family: 'Source Sans 3', sans-serif;
      font-size: 1rem;
      color: var(--navy);
      background: #fdfaf5;
      transition: border-color 0.2s;
      outline: none;
    }

    input:focus {
      border-color: var(--crimson);
      background: white;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    /* BUTTONS */
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 13px 28px;
      border: none;
      border-radius: 3px;
      font-family: 'Source Sans 3', sans-serif;
      font-weight: 700;
      font-size: 0.9rem;
      letter-spacing: 1px;
      text-transform: uppercase;
      cursor: pointer;
      transition: all 0.2s;
    }

    .btn:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none !important;
    }

    .btn-primary {
      background: var(--crimson);
      color: white;
    }

    .btn-primary:hover:not(:disabled) {
      background: var(--deep-red);
      transform: translateY(-1px);
    }

    .btn-secondary {
      background: transparent;
      color: var(--navy);
      border: 1.5px solid var(--border);
    }

    .btn-secondary:hover {
      background: var(--light);
    }

    .btn-success {
      background: var(--success);
      color: white;
    }

    .btn-success:hover:not(:disabled) {
      background: #219a52;
      transform: translateY(-1px);
    }

    .btn-row {
      display: flex;
      gap: 12px;
      margin-top: 24px;
      flex-wrap: wrap;
    }

    /* ALERTS */
    .alert {
      padding: 12px 16px;
      border-radius: 3px;
      font-size: 0.88rem;
      margin-bottom: 16px;
      display: none;
    }

    .alert.show {
      display: block;
    }

    .alert-error {
      background: #fde8e8;
      border: 1px solid #f5c6c6;
      color: #922b21;
    }

    .alert-success {
      background: #e8f8ee;
      border: 1px solid #a9dfbf;
      color: #1e8449;
    }

    .alert-warning {
      background: #fff8e1;
      border: 1px solid #f0d060;
      color: #7a6020;
    }

    /* VOTER INFO BOX */
    .voter-info {
      background: var(--light);
      border: 1px solid var(--border);
      border-radius: 3px;
      padding: 20px;
      margin-bottom: 28px;
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .voter-avatar {
      width: 56px;
      height: 56px;
      background: var(--crimson);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.4rem;
      font-weight: 700;
      flex-shrink: 0;
    }

    .voter-details h3 {
      font-weight: 700;
      font-size: 1.1rem;
    }

    .voter-details p {
      color: var(--gray);
      font-size: 0.85rem;
      margin-top: 2px;
    }

    /* PARTY CARDS */
    .section-label {
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 2px;
      color: var(--gray);
      font-weight: 700;
      margin-bottom: 14px;
    }

    .party-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
      margin-bottom: 28px;
    }

    .party-card {
      border: 2px solid var(--border);
      border-radius: 4px;
      padding: 18px;
      cursor: pointer;
      transition: all 0.2s;
      position: relative;
      background: white;
    }

    .party-card:hover {
      border-color: var(--crimson);
      transform: translateY(-2px);
      box-shadow: 0 4px 16px rgba(192, 57, 43, 0.1);
    }

    .party-card.selected {
      border-color: var(--crimson);
      background: #fff5f4;
    }

    .party-card.selected::after {
      content: '✓';
      position: absolute;
      top: 10px;
      right: 12px;
      background: var(--crimson);
      color: white;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
      font-weight: 700;
    }

    .party-symbol {
      font-size: 2rem;
      margin-bottom: 8px;
    }

    .party-name {
      font-weight: 700;
      font-size: 0.95rem;
      color: var(--navy);
    }

    .party-name-np {
      font-size: 0.8rem;
      color: var(--gray);
      margin-top: 2px;
    }

    .party-abbr {
      display: inline-block;
      margin-top: 6px;
      padding: 2px 8px;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 1px;
      border-radius: 2px;
      text-transform: uppercase;
    }

    /* SUMMARY */
    .summary-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 0;
      border-bottom: 1px solid var(--border);
    }

    .summary-label {
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--gray);
      font-weight: 600;
    }

    .summary-value {
      font-weight: 700;
      font-size: 1rem;
      color: var(--navy);
    }

    /* CONFIRM */
    .confirm-banner {
      background: linear-gradient(135deg, var(--navy), var(--slate));
      border-radius: 4px;
      padding: 40px;
      text-align: center;
      color: white;
      margin-bottom: 20px;
    }

    .confirm-icon {
      font-size: 3.5rem;
      margin-bottom: 16px;
    }

    .confirm-banner h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      margin-bottom: 10px;
    }

    .confirm-banner p {
      opacity: 0.8;
      font-size: 0.95rem;
    }

    .ref-number {
      background: var(--light);
      border: 1px solid var(--border);
      border-radius: 3px;
      padding: 14px 20px;
      text-align: center;
      font-family: monospace;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--crimson);
      letter-spacing: 3px;
      margin: 16px 0;
    }

    .disclaimer {
      background: #fff8e1;
      border: 1px solid #f0d060;
      border-radius: 3px;
      padding: 14px 16px;
      font-size: 0.82rem;
      color: #7a6020;
      margin-bottom: 24px;
      line-height: 1.6;
    }

    .disclaimer strong {
      display: block;
      margin-bottom: 4px;
    }

    /* LOADER */
    .spinner {
      display: inline-block;
      width: 16px;
      height: 16px;
      border: 2px solid rgba(255, 255, 255, 0.4);
      border-radius: 50%;
      border-top-color: white;
      animation: spin 0.7s linear infinite;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    /* ===== RESULTS PAGE ===== */
    .results-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 28px;
    }

    .results-header h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
    }

    .refresh-btn {
      background: var(--navy);
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 3px;
      font-size: 0.8rem;
      cursor: pointer;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .refresh-btn:hover {
      background: var(--slate);
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      margin-bottom: 32px;
    }

    .stat-box {
      background: white;
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: 20px;
      text-align: center;
    }

    .stat-num {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 900;
      color: var(--crimson);
    }

    .stat-label {
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--gray);
      margin-top: 4px;
      font-weight: 600;
    }

    .party-results {
      margin-bottom: 32px;
    }

    .party-result-row {
      background: white;
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: 18px 20px;
      margin-bottom: 10px;
    }

    .party-result-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }

    .party-result-name {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .party-result-name .sym {
      font-size: 1.5rem;
    }

    .party-result-name .nm {
      font-weight: 700;
      font-size: 0.95rem;
    }

    .party-result-name .ab {
      font-size: 0.7rem;
      font-weight: 700;
      padding: 2px 7px;
      border-radius: 2px;
      margin-left: 4px;
    }

    .vote-count-display {
      font-weight: 700;
      font-size: 1.1rem;
      color: var(--navy);
    }

    .vote-pct {
      color: var(--gray);
      font-size: 0.85rem;
      margin-left: 6px;
    }

    .progress-bar {
      height: 8px;
      background: var(--light);
      border-radius: 4px;
      overflow: hidden;
    }

    .progress-fill {
      height: 100%;
      border-radius: 4px;
      transition: width 0.8s ease;
    }

    .winner-badge {
      display: inline-block;
      background: var(--gold);
      color: #5a3a00;
      font-size: 0.7rem;
      font-weight: 700;
      padding: 2px 8px;
      border-radius: 2px;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-left: 8px;
    }

    .recent-table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border: 1px solid var(--border);
      border-radius: 4px;
      overflow: hidden;
    }

    .recent-table th {
      background: var(--navy);
      color: white;
      padding: 10px 14px;
      text-align: left;
      font-size: 0.78rem;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .recent-table td {
      padding: 10px 14px;
      border-bottom: 1px solid var(--border);
      font-size: 0.88rem;
    }

    .recent-table tr:last-child td {
      border-bottom: none;
    }

    .recent-table tr:hover td {
      background: var(--light);
    }

    .loading-overlay {
      text-align: center;
      padding: 60px 20px;
      color: var(--gray);
    }

    .big-spinner {
      width: 40px;
      height: 40px;
      border: 3px solid var(--border);
      border-top-color: var(--crimson);
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
      margin: 0 auto 16px;
    }

    footer {
      text-align: center;
      padding: 24px;
      border-top: 1px solid var(--border);
      color: var(--gray);
      font-size: 0.8rem;
      line-height: 1.7;
      background: white;
    }

    @media (max-width: 600px) {

      .form-row,
      .party-grid,
      .stats-grid {
        grid-template-columns: 1fr;
      }

      .card {
        padding: 24px;
      }

      .header-text h1 {
        font-size: 1.3rem;
      }

      .nav-tabs {
        padding: 0 16px;
      }

      .nav-tab {
        padding: 12px 14px;
        font-size: 0.75rem;
      }
    }
  </style>
</head>

<body>

  <header>
    <div class="header-top">
      <div class="nepal-emblem"></div>
      <div class="header-text">
        <h1>Nepal E-Voting System</h1>
        <p>नेपाल इलेक्ट्रोनिक मतदान प्रणाली</p>
      </div>
      <div class="nepal-emblem"></div>
    </div>
    <div class="header-bar">Election Commission of Nepal &nbsp;|&nbsp; निर्वाचन आयोग नेपाल &nbsp;|&nbsp; 2082 B.S.</div>
  </header>

  <div class="nav-tabs">
    <div class="nav-tab active" onclick="showPage('votePage', this)">🗳️ Cast Vote</div>
    <div class="nav-tab" onclick="showPage('resultsPage', this); loadResults();">📊 Live Results</div>
  </div>

  <!-- ===== VOTE PAGE ===== -->
  <div class="page active" id="votePage">
    <div class="container">

      <div class="steps-bar">
        <div class="step active" id="s1">
          <div class="step-num">1</div>
          <div class="step-label">Verify</div>
        </div>
        <div class="step-line" id="l1"></div>
        <div class="step" id="s2">
          <div class="step-num">2</div>
          <div class="step-label">Party</div>
        </div>
        <div class="step-line" id="l2"></div>
        <div class="step" id="s3">
          <div class="step-num">3</div>
          <div class="step-label">Confirm</div>
        </div>
        <div class="step-line" id="l3"></div>
        <div class="step" id="s4">
          <div class="step-num">4</div>
          <div class="step-label">Done</div>
        </div>
      </div>

      <!-- STEP 1: VERIFY -->
      <div class="card active" id="step1">
        <div class="card-title">Voter Verification</div>
        <div class="card-subtitle">मतदाता परिचय प्रमाणीकरण — Enter your details to authenticate your identity.</div>

        <div class="disclaimer">
          <strong>⚠️ Demo Notice</strong>
          This connects to your local XAMPP MySQL database. Use Voter ID format: <strong>NPL-123456</strong> (any 6+ digit number). First use auto-registers you.
        </div>

        <div id="verifyAlert" class="alert"></div>

        <div class="form-row">
          <div class="form-group">
            <label>Voter ID / मतदाता परिचय पत्र</label>
            <input type="text" id="voterId" placeholder="e.g. NPL-123456" />
          </div>
          <div class="form-group">
            <label>Date of Birth / जन्म मिति</label>
            <input type="date" id="dob" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Full Name / पूरा नाम</label>
            <input type="text" id="fullName" placeholder="Ramesh Kumar Sharma" />
          </div>
          <div class="form-group">
            <label>Province / प्रदेश</label>
            <input type="text" id="province" placeholder="Bagmati Province" />
          </div>
        </div>
        <div class="form-group">
          <label>Mobile Number / मोबाइल नम्बर</label>
          <input type="tel" id="mobile" placeholder="+977 98XXXXXXXX" />
        </div>

        <div class="btn-row">
          <button class="btn btn-primary" id="verifyBtn" onclick="verifyVoter()">Verify & Proceed →</button>
        </div>
      </div>

      <!-- STEP 2: PARTY -->
      <div class="card" id="step2">
        <div class="card-title">Select Your Party</div>
        <div class="card-subtitle">दल छनौट गर्नुहोस् — Choose one political party to cast your vote for.</div>

        <div class="voter-info">
          <div class="voter-avatar" id="voterInitial">R</div>
          <div class="voter-details">
            <h3 id="voterNameDisplay">Voter Name</h3>
            <p id="voterIdDisplay">ID: —</p>
          </div>
        </div>

        <div id="partyAlert" class="alert"></div>
        <div class="section-label">Major Political Parties — प्रमुख राजनीतिक दलहरू</div>

        <div class="party-grid">
          <div class="party-card" onclick="selectParty(this, 'CPN-UML')">
            <div class="party-symbol">☀️</div>
            <div class="party-name">CPN (Unified Marxist–Leninist)</div>
            <div class="party-name-np">नेकपा (एकीकृत माक्र्सवादी–लेनिनवादी)</div>
            <span class="party-abbr" style="background:#c0392b;color:white;">CPN-UML</span>
          </div>
          <div class="party-card" onclick="selectParty(this, 'NC')">
            <div class="party-symbol">🌳</div>
            <div class="party-name">Nepali Congress</div>
            <div class="party-name-np">नेपाली कांग्रेस</div>
            <span class="party-abbr" style="background:#1a5276;color:white;">NC</span>
          </div>
          <div class="party-card" onclick="selectParty(this, 'CPN-MC')">
            <div class="party-symbol">🔨</div>
            <div class="party-name">CPN (Maoist Centre)</div>
            <div class="party-name-np">नेकपा (माओवादी केन्द्र)</div>
            <span class="party-abbr" style="background:#922b21;color:white;">CPN-MC</span>
          </div>
          <div class="party-card" onclick="selectParty(this, 'RSP')">
            <div class="party-symbol">🔔</div>
            <div class="party-name">Rastriya Swatantra Party</div>
            <div class="party-name-np">राष्ट्रिय स्वतन्त्र पार्टी</div>
            <span class="party-abbr" style="background:#117864;color:white;">RSP</span>
          </div>
          <div class="party-card" onclick="selectParty(this, 'RPP')">
            <div class="party-symbol">🏔️</div>
            <div class="party-name">Rastriya Prajatantra Party</div>
            <div class="party-name-np">राष्ट्रिय प्रजातन्त्र पार्टी</div>
            <span class="party-abbr" style="background:#6c3483;color:white;">RPP</span>
          </div>
          <div class="party-card" onclick="selectParty(this, 'LSP')">
            <div class="party-symbol">🌾</div>
            <div class="party-name">Loktantrik Samajwadi Party</div>
            <div class="party-name-np">लोकतान्त्रिक समाजवादी पार्टी</div>
            <span class="party-abbr" style="background:#d35400;color:white;">LSP</span>
          </div>
        </div>

        <div class="btn-row">
          <button class="btn btn-secondary" onclick="goTo(1)">← Back</button>
          <button class="btn btn-primary" onclick="goToReview()">Review Vote →</button>
        </div>
      </div>

      <!-- STEP 3: REVIEW -->
      <div class="card" id="step3">
        <div class="card-title">Review Your Vote</div>
        <div class="card-subtitle">मत समीक्षा — Review your choices carefully. Votes cannot be changed after submission.</div>

        <div class="summary-row">
          <span class="summary-label">Voter Name</span>
          <span class="summary-value" id="rev-name">—</span>
        </div>
        <div class="summary-row">
          <span class="summary-label">Voter ID</span>
          <span class="summary-value" id="rev-id">—</span>
        </div>
        <div class="summary-row" style="border-bottom:none;">
          <span class="summary-label">Party Choice</span>
          <span class="summary-value" id="rev-party">—</span>
        </div>

        <div id="submitAlert" class="alert" style="margin-top:16px;"></div>

        <div class="disclaimer" style="margin-top:20px;">
          <strong>📋 Declaration / घोषणापत्र</strong>
          I solemnly declare that I am a registered voter casting this vote freely. Multiple voting is a criminal offence under Nepal's Election Law.
        </div>

        <div class="btn-row">
          <button class="btn btn-secondary" onclick="goTo(2)">← Change Vote</button>
          <button class="btn btn-success" id="submitBtn" onclick="submitVote()">✓ Submit My Vote</button>
        </div>
      </div>

      <!-- STEP 4: SUCCESS -->
      <div class="card" id="step4">
        <div class="confirm-banner">
          <div class="confirm-icon">🗳️</div>
          <h2>Vote Cast Successfully!</h2>
          <p>धन्यवाद! तपाईंको मत सफलतापूर्वक दर्ता भयो।<br>Thank you for participating in Nepal's democracy.</p>
        </div>
        <div class="summary-row">
          <span class="summary-label">Reference Number</span>
          <span class="summary-value" id="refNumber" style="font-family:monospace; color:var(--crimson); letter-spacing:2px;">—</span>
        </div>
        <div style="margin-top:20px; padding:16px; background:var(--light); border:1px solid var(--border); border-radius:3px; font-size:0.85rem; line-height:1.8; color:#555;">
          <strong style="color:var(--navy); display:block; margin-bottom:8px;">📌 Important Notes</strong>
          • Your vote has been saved to the database securely.<br>
          • Save your reference number for your records.<br>
          • Results are visible live on the Results tab.<br>
          • For queries, contact Election Commission: 01-4712937
        </div>
        <div class="btn-row">
          <button class="btn btn-primary" onclick="showPage('resultsPage', document.querySelectorAll('.nav-tab')[1]); loadResults();">📊 View Live Results</button>
        </div>
      </div>

    </div>
  </div>

  <!-- ===== RESULTS PAGE ===== -->
  <div class="page" id="resultsPage">
    <div class="container">
      <div class="results-header">
        <h2>Live Election Results</h2>
        <button class="refresh-btn" onclick="loadResults()">↺ Refresh</button>
      </div>

      <div id="resultsLoading" class="loading-overlay">
        <div class="big-spinner"></div>
        <p>Fetching results from database...</p>
      </div>

      <div id="resultsContent" style="display:none;">
        <div class="stats-grid" id="statsGrid"></div>
        <div class="section-label">Party Vote Counts — दलगत मत संख्या</div>
        <div class="party-results" id="partyResults"></div>
        <div class="section-label" style="margin-top:28px;">Recent Votes (Anonymized) — हालैका मतहरू</div>
        <table class="recent-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Reference Number</th>
              <th>Party Voted</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody id="recentVotes"></tbody>
        </table>
        <p style="font-size:0.75rem; color:var(--gray); margin-top:10px;">Last updated: <span id="lastUpdated">—</span></p>
      </div>

      <div id="resultsError" class="alert alert-error" style="display:none;"></div>
    </div>
  </div>

  <footer>
    Election Commission of Nepal &nbsp;|&nbsp; निर्वाचन आयोग, नेपाल<br>
    Kantipath, Kathmandu, Nepal &nbsp;|&nbsp; 🔒 PHP + MySQL Backend &nbsp;|&nbsp; © 2082 B.S.
  </footer>

  <script>
    // ── State ──
    let selectedParty = null;
    let voterData = {};
    let currentStep = 1;

    // ── Page switching ──
    function showPage(pageId, tabEl) {
      document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
      document.querySelectorAll('.nav-tab').forEach(t => t.classList.remove('active'));
      document.getElementById(pageId).classList.add('active');
      tabEl.classList.add('active');
    }

    // ── Steps ──
    function goTo(step) {
      document.getElementById('step' + currentStep).classList.remove('active');
      currentStep = step;
      document.getElementById('step' + currentStep).classList.add('active');
      updateSteps();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }

    function updateSteps() {
      for (let i = 1; i <= 4; i++) {
        const s = document.getElementById('s' + i);
        s.classList.remove('active', 'done');
        if (i < currentStep) s.classList.add('done');
        if (i === currentStep) s.classList.add('active');
      }
      for (let i = 1; i <= 3; i++) {
        const l = document.getElementById('l' + i);
        l.classList.remove('done');
        if (i < currentStep) l.classList.add('done');
      }
    }

    // ── Alert helper ──
    function showAlert(id, msg, type) {
      const el = document.getElementById(id);
      el.className = 'alert alert-' + type + ' show';
      el.textContent = msg;
    }

    function hideAlert(id) {
      document.getElementById(id).className = 'alert';
    }

    // ── STEP 1: Verify voter via PHP API ──
    async function verifyVoter() {
      const voter_id = document.getElementById('voterId').value.trim();
      const dob = document.getElementById('dob').value;
      const full_name = document.getElementById('fullName').value.trim();
      const province = document.getElementById('province').value.trim();
      const mobile = document.getElementById('mobile').value.trim();

      hideAlert('verifyAlert');

      if (!voter_id || !dob || !full_name) {
        showAlert('verifyAlert', '⚠️ Voter ID, Date of Birth, and Full Name are required.', 'error');
        return;
      }

      const btn = document.getElementById('verifyBtn');
      btn.disabled = true;
      btn.innerHTML = '<span class="spinner"></span> Verifying...';

      try {
        const res = await fetch('api/verify_voter.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            voter_id,
            dob,
            full_name,
            province,
            mobile
          })
        });
        const data = await res.json();

        if (!data.success) {
          showAlert('verifyAlert', '❌ ' + data.message, data.has_voted ? 'warning' : 'error');
        } else {
          voterData = {
            id: data.voter_id,
            name: data.full_name,
            province: data.province
          };
          document.getElementById('voterInitial').textContent = data.full_name.charAt(0).toUpperCase();
          document.getElementById('voterNameDisplay').textContent = data.full_name;
          document.getElementById('voterIdDisplay').textContent = `ID: ${data.voter_id}  |  ${data.province || 'N/A'}`;
          goTo(2);
        }
      } catch (err) {
        showAlert('verifyAlert', '❌ Cannot connect to server. Make sure XAMPP is running and this file is in htdocs/nepal-voting/.', 'error');
      }

      btn.disabled = false;
      btn.innerHTML = 'Verify & Proceed →';
    }

    // ── STEP 2: Select party ──
    function selectParty(el, code) {
      document.querySelectorAll('.party-card').forEach(c => c.classList.remove('selected'));
      el.classList.add('selected');
      selectedParty = code;
      hideAlert('partyAlert');
    }

    function goToReview() {
      if (!selectedParty) {
        showAlert('partyAlert', '⚠️ Please select a party before proceeding.', 'error');
        return;
      }
      document.getElementById('rev-name').textContent = voterData.name;
      document.getElementById('rev-id').textContent = voterData.id;
      document.getElementById('rev-party').textContent = selectedParty;
      hideAlert('submitAlert');
      goTo(3);
    }

    // ── STEP 3: Submit vote via PHP API ──
    async function submitVote() {
      const btn = document.getElementById('submitBtn');
      btn.disabled = true;
      btn.innerHTML = '<span class="spinner"></span> Submitting...';
      hideAlert('submitAlert');

      try {
        const res = await fetch('api/submit_vote.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            voter_id: voterData.id,
            party_code: selectedParty
          })
        });
        const data = await res.json();

        if (!data.success) {
          showAlert('submitAlert', '❌ ' + data.message, 'error');
          btn.disabled = false;
          btn.innerHTML = '✓ Submit My Vote';
        } else {
          document.getElementById('refNumber').textContent = data.reference_number;
          goTo(4);
        }
      } catch (err) {
        showAlert('submitAlert', '❌ Server error. Please try again.', 'error');
        btn.disabled = false;
        btn.innerHTML = '✓ Submit My Vote';
      }
    }

    // ── RESULTS: Load from PHP API ──
    async function loadResults() {
      document.getElementById('resultsLoading').style.display = 'block';
      document.getElementById('resultsContent').style.display = 'none';
      document.getElementById('resultsError').style.display = 'none';

      try {
        const res = await fetch('api/get_results.php');
        const data = await res.json();

        if (!data.success) throw new Error(data.message);

        // Stats
        document.getElementById('statsGrid').innerHTML = `
        <div class="stat-box">
          <div class="stat-num">${data.total_votes}</div>
          <div class="stat-label">Total Votes Cast</div>
        </div>
        <div class="stat-box">
          <div class="stat-num">${data.total_voters}</div>
          <div class="stat-label">Registered Voters</div>
        </div>
        <div class="stat-box">
          <div class="stat-num">${data.turnout_pct}%</div>
          <div class="stat-label">Voter Turnout</div>
        </div>
      `;

        // Find max votes
        const maxVotes = Math.max(...data.parties.map(p => p.vote_count));

        // Check if there is a clear leader
        const leaders = data.parties.filter(p => p.vote_count === maxVotes);
        const hasClearLeader = leaders.length === 1 && maxVotes > 0;

        document.getElementById('partyResults').innerHTML = data.parties.map(p => `
  <div class="party-result-row">
    <div class="party-result-top">
      <div class="party-result-name">
        <span class="sym">${p.symbol}</span>
        <span class="nm">${p.name_en}</span>
        <span class="ab" style="background:${p.color};color:white;">${p.abbr}</span>
        ${
          hasClearLeader && p.vote_count === maxVotes
            ? '<span class="winner-badge">Leading</span>'
            : ''
        }
      </div>
      <div>
        <span class="vote-count-display">${p.vote_count} votes</span>
        <span class="vote-pct">(${p.percentage}%)</span>
      </div>
    </div>
    <div class="progress-bar">
      <div class="progress-fill"
           style="width:${maxVotes > 0 ? (p.vote_count / maxVotes * 100) : 0}%;
                  background:${p.color};">
      </div>
    </div>
  </div>
`).join('');
        // Recent votes
        document.getElementById('recentVotes').innerHTML = data.recent_votes.length === 0 ?
          '<tr><td colspan="4" style="text-align:center; color:var(--gray); padding:20px;">No votes yet.</td></tr>' :
          data.recent_votes.map((v, i) => `
          <tr>
            <td>${i + 1}</td>
            <td style="font-family:monospace; font-size:0.82rem; color:var(--crimson);">${v.reference_number}</td>
            <td>${v.symbol} ${v.party}</td>
            <td style="color:var(--gray); font-size:0.82rem;">${new Date(v.voted_at).toLocaleString()}</td>
          </tr>
        `).join('');

        document.getElementById('lastUpdated').textContent = new Date(data.timestamp).toLocaleString();
        document.getElementById('resultsLoading').style.display = 'none';
        document.getElementById('resultsContent').style.display = 'block';

      } catch (err) {
        document.getElementById('resultsLoading').style.display = 'none';
        const errEl = document.getElementById('resultsError');
        errEl.style.display = 'block';
        errEl.textContent = '❌ Failed to load results: ' + err.message + '. Make sure XAMPP is running.';
      }
    }
  </script>
</body>

</html>