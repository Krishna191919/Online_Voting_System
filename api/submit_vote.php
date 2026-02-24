<?php
// api/submit_vote.php
// POST: { voter_id, party_code }

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../db_config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$data       = json_decode(file_get_contents('php://input'), true);
$voter_id   = strtoupper(trim($data['voter_id'] ?? ''));
$party_code = strtoupper(trim($data['party_code'] ?? ''));

if (!$voter_id || !$party_code) {
    echo json_encode(['success' => false, 'message' => 'Voter ID and party selection are required.']);
    exit;
}

$db = getDB();

// Double-check voter hasn't already voted (race condition guard)
$stmt = $db->prepare("SELECT has_voted FROM voters WHERE voter_id = ?");
$stmt->bind_param('s', $voter_id);
$stmt->execute();
$res = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$res) {
    echo json_encode(['success' => false, 'message' => 'Voter not found.']);
    $db->close(); exit;
}
if ($res['has_voted']) {
    echo json_encode(['success' => false, 'message' => 'Vote already submitted.']);
    $db->close(); exit;
}

// Verify party exists
$ps = $db->prepare("SELECT code FROM parties WHERE code = ?");
$ps->bind_param('s', $party_code);
$ps->execute();
if ($ps->get_result()->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid party selection.']);
    $ps->close(); $db->close(); exit;
}
$ps->close();

// Generate unique reference number
$ref = 'NPL-2081-' . strtoupper(substr(md5(uniqid($voter_id, true)), 0, 8));
$ip  = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

// Insert vote
$ins = $db->prepare("INSERT INTO votes (voter_id, party_code, reference_number, ip_address) VALUES (?, ?, ?, ?)");
$ins->bind_param('ssss', $voter_id, $party_code, $ref, $ip);

if (!$ins->execute()) {
    echo json_encode(['success' => false, 'message' => 'Failed to save vote. Please try again.']);
    $ins->close(); $db->close(); exit;
}
$ins->close();

// Mark voter as voted
$upd = $db->prepare("UPDATE voters SET has_voted = 1 WHERE voter_id = ?");
$upd->bind_param('s', $voter_id);
$upd->execute();
$upd->close();

$db->close();

echo json_encode([
    'success'          => true,
    'reference_number' => $ref,
    'message'          => 'Vote submitted successfully.'
]);
?>
