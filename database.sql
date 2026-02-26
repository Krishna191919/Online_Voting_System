-- Nepal E-Voting System Database
-- Run this in phpMyAdmin or MySQL CLI

CREATE DATABASE IF NOT EXISTS nepal_voting CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE nepal_voting;

-- Voters table
CREATE TABLE IF NOT EXISTS voters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    voter_id VARCHAR(20) UNIQUE NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    dob DATE NOT NULL,
    province VARCHAR(100),
    mobile VARCHAR(20),
    has_voted TINYINT(1) DEFAULT 0,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Parties table
CREATE TABLE IF NOT EXISTS parties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) UNIQUE NOT NULL,
    name_en VARCHAR(150) NOT NULL,
    name_np VARCHAR(150),
    symbol VARCHAR(10),
    color VARCHAR(10),
    abbr VARCHAR(20)
);

-- Votes table
CREATE TABLE IF NOT EXISTS votes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    voter_id VARCHAR(20) NOT NULL,
    party_code VARCHAR(20) NOT NULL,
    reference_number VARCHAR(30) UNIQUE NOT NULL,
    voted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45),
    FOREIGN KEY (voter_id) REFERENCES voters(voter_id),
    FOREIGN KEY (party_code) REFERENCES parties(code)
);

-- Seed demo voters
INSERT IGNORE INTO voters (voter_id, full_name, dob, province, mobile) VALUES
('NPL-123456', 'Sanjog Kumar', '2004-01-01', 'Lumbini Province', '9800000001'),
('NPL-234567', 'Karan Chaudhary', '2005-02-02', 'Gandaki Province', '9800000002'),
('NPL-345678', 'Om Chaudhary', '2005-03-03', 'Lumbini Province', '9800000003'),
('NPL-456789', 'Brisav Singh', '2005-04-04', 'Koshi Province', '9880000004'),
('NPL-567890', 'Risab Giri', '2004-05-05', 'Madhesh Province', '9880000005'),
('NPL-678901', 'Aditya Shrestha', '2004-06-06', 'Madhesh Province', '9800000006');

-- Seed parties
INSERT IGNORE INTO parties (code, name_en, name_np, symbol, color, abbr) VALUES
('CPN-UML', 'CPN (Unified Marxist–Leninist)', 'नेकपा (एकीकृत माक्र्सवादी–लेनिनवादी)', '☀️', '#c0392b', 'CPN-UML'),
('NC', 'Nepali Congress', 'नेपाली कांग्रेस', '🌳', '#1a5276', 'NC'),
('CPN-MC', 'CPN (Maoist Centre)', 'नेकपा (माओवादी केन्द्र)', '🔨', '#922b21', 'CPN-MC'),
('RSP', 'Rastriya Swatantra Party', 'राष्ट्रिय स्वतन्त्र पार्टी', '🔔', '#117864', 'RSP'),
('RPP', 'Rastriya Prajatantra Party', 'राष्ट्रिय प्रजातन्त्र पार्टी', '🏔️', '#6c3483', 'RPP'),
('LSP', 'Loktantrik Samajwadi Party', 'लोकतान्त्रिक समाजवादी पार्टी', '🌾', '#d35400', 'LSP');
