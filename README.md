# 🇳🇵 Nepal E-Voting System — XAMPP Setup Guide

## Files in this project
```
nepal-voting/
├── index.php           ← Main frontend (voting + results)
├── db_config.php       ← Database connection settings
├── database.sql        ← Run this to create DB + tables
└── api/
    ├── verify_voter.php   ← POST: verify voter identity
    ├── submit_vote.php    ← POST: save vote to database
    └── get_results.php    ← GET:  fetch live results
```

---

## ⚙️ XAMPP Setup Steps

### Step 1 — Start XAMPP
- Open XAMPP Control Panel
- Start **Apache** and **MySQL**

### Step 2 — Copy project files
Copy the entire `nepal-voting/` folder to:
```
C:\xampp\htdocs\nepal-voting\
```

### Step 3 — Create the database
1. Open your browser → go to `http://localhost/phpmyadmin`
2. Click **"New"** in the left sidebar
3. Create database named: `nepal_voting`
4. Click on `nepal_voting` database
5. Click **"SQL"** tab at the top
6. Paste the contents of `database.sql`
7. Click **"Go"** to run

### Step 4 — Open the app
Go to: `http://localhost/nepal-voting/`

---

## 🗳️ How to Test

**Test Voter IDs (pre-seeded in DB):**
| Voter ID     | Name                  | DOB        |
|--------------|-----------------------|------------|
| NPL-123456   | Ram Kumar Sharma      | 1990-05-15 |
| NPL-234567   | Sita Devi Thapa       | 1985-08-22 |
| NPL-345678   | Hari Bahadur Gurung   | 1978-03-10 |

Or enter any new `NPL-XXXXXX` ID — it will auto-register you.

**After voting:**
- Click the **"📊 Live Results"** tab to see real-time vote counts from the database.

---

## 🔒 Security Features
- Duplicate voting prevention (one vote per Voter ID)
- Date of birth verification against database
- Unique encrypted reference numbers
- IP address logging per vote

---

## 🛠️ Troubleshooting

| Problem | Solution |
|---|---|
| "Cannot connect to server" | Make sure Apache & MySQL are running in XAMPP |
| "Database connection failed" | Run `database.sql` in phpMyAdmin first |
| Page not found | Check files are in `C:\xampp\htdocs\nepal-voting\` |
| Already voted error | Use a different Voter ID |
