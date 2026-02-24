<?php
// api/verify_voter.php
// POST: { voter_id, dob, full_name, province, mobile }

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../db_config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

$voter_id = strtoupper(trim($data['voter_id'] ?? ''));
$dob      = trim($data['dob'] ?? '');
$name     = trim($data['full_name'] ?? '');
$province = trim($data['province'] ?? '');
$mobile   = trim($data['mobile'] ?? '');

// Validate input
if (!$voter_id || !$dob || !$name) {
    echo json_encode(['success' => false, 'message' => 'Voter ID, date of birth, and name are required.']);
    exit;
}

if (!preg_match('/^NPL-\d{4,}$/i', $voter_id)) {
    echo json_encode(['success' => false, 'message' => 'Invalid Voter ID format. Use NPL-XXXXXX.']);
    exit;
}

$db = getDB();

// Check if voter exists in database
$stmt = $db->prepare("SELECT voter_id, full_name, dob, province, has_voted FROM voters WHERE voter_id = ?");
$stmt->bind_param('s', $voter_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Voter not found — register them (demo mode)
    $insert = $db->prepare("INSERT INTO voters (voter_id, full_name, dob, province, mobile) VALUES (?, ?, ?, ?, ?)");
    $insert->bind_param('sssss', $voter_id, $name, $dob, $province, $mobile);
    if ($insert->execute()) {
        echo json_encode([
            'success'    => true,
            'voter_id'   => $voter_id,
            'full_name'  => $name,
            'province'   => $province,
            'has_voted'  => false,
            'message'    => 'New voter registered and verified.'
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to register voter.']);
    }
    $insert->close();
} else {
    $voter = $result->fetch_assoc();

    // Check if already voted
    if ($voter['has_voted']) {
        echo json_encode([
            'success'   => false,
            'has_voted' => true,
            'message'   => 'This Voter ID has already cast a vote. Duplicate voting is not allowed.'
        ]);
        $stmt->close();
        $db->close();
        exit;
    }

    // Verify DOB matches
    if ($voter['dob'] !== $dob) {
        echo json_encode(['success' => false, 'message' => 'Date of birth does not match our records.']);
        $stmt->close();
        $db->close();
        exit;
    }

    echo json_encode([
        'success'   => true,
        'voter_id'  => $voter['voter_id'],
        'full_name' => $voter['full_name'],
        'province'  => $voter['province'],
        'has_voted' => false,
        'message'   => 'Voter verified successfully.'
    ]);
}

$stmt->close();
$db->close();
?>
