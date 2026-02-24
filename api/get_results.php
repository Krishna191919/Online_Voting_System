<?php
// api/get_results.php
// GET: returns vote counts per party + total stats

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once '../db_config.php';

$db = getDB();

// Total votes
$total_res   = $db->query("SELECT COUNT(*) as total FROM votes")->fetch_assoc();
$total_votes = (int)$total_res['total'];

// Total registered voters
$reg_res  = $db->query("SELECT COUNT(*) as total FROM voters")->fetch_assoc();
$total_reg = (int)$reg_res['total'];

// Votes per party (joined with parties table for display info)
$sql = "
    SELECT 
        p.code,
        p.name_en,
        p.name_np,
        p.symbol,
        p.color,
        p.abbr,
        COUNT(v.id) as vote_count
    FROM parties p
    LEFT JOIN votes v ON p.code = v.party_code
    GROUP BY p.id
    ORDER BY vote_count DESC
";

$result  = $db->query($sql);
$parties = [];

while ($row = $result->fetch_assoc()) {
    $count = (int)$row['vote_count'];
    $pct   = $total_votes > 0 ? round(($count / $total_votes) * 100, 1) : 0;
    $parties[] = [
        'code'       => $row['code'],
        'name_en'    => $row['name_en'],
        'name_np'    => $row['name_np'],
        'symbol'     => $row['symbol'],
        'color'      => $row['color'],
        'abbr'       => $row['abbr'],
        'vote_count' => $count,
        'percentage' => $pct,
    ];
}

// Recent votes (last 10, anonymized)
$recent_sql = "
    SELECT 
        v.reference_number,
        p.name_en as party,
        p.symbol,
        p.color,
        v.voted_at
    FROM votes v
    JOIN parties p ON v.party_code = p.code
    ORDER BY v.voted_at DESC
    LIMIT 10
";
$rec_res = $db->query($recent_sql);
$recent  = [];
while ($row = $rec_res->fetch_assoc()) {
    $recent[] = $row;
}

$db->close();

echo json_encode([
    'success'      => true,
    'total_votes'  => $total_votes,
    'total_voters' => $total_reg,
    'turnout_pct'  => $total_reg > 0 ? round(($total_votes / $total_reg) * 100, 1) : 0,
    'parties'      => $parties,
    'recent_votes' => $recent,
    'timestamp'    => date('Y-m-d H:i:s'),
]);
?>
