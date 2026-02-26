 🇳🇵 Nepal E-Voting System — Guide

 Files in this project

nepal-voting/
├── index.php           ← Main frontend (voting + results)
├── db_config.php       ← Database connection settings
├── database.sql        ← Run this to create DB + tables
└── api/
    ├── verify_voter.php   ← POST: verify voter identity
    ├── submit_vote.php    ← POST: save vote to database
    └── get_results.php    ← GET:  fetch live results



 🗳️ How to Test

**Test Voter IDs (pre-seeded in DB):**
| Voter ID     | Name                  | DOB        |
|--------------|-----------------------|------------|
| NPL-123456   | Sanjog Kumar      | 2004-01-01 |
| NPL-234567   | Karan Chaudhary       | 2005-02-02 |
| NPL-345678   | Om Chaudhary   | 2005-03-03 |



 🔒 Security Features
- Duplicate voting prevention (one vote per Voter ID)
- Date of birth verification against database
- Unique encrypted reference numbers
- IP address logging per vote

---

 🛠️ Troubleshooting

| Problem | Solution |
|---|---|
| "Cannot connect to server" | Make sure Apache & MySQL are running in XAMPP |
| "Database connection failed" | Run `database.sql` in phpMyAdmin first |
| Page not found | Check files are in `C:\xampp\htdocs\nepal-voting\` |
| Already voted error | Use a different Voter ID |
