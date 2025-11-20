<?php
declare(strict_types=1);

require_once __DIR__ . '/tools.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /public/index.php');
    exit;
}

// Load notes
$notes = load_notes();

// Get index
$index = (int)($_POST['index'] ?? -1);

// Delete note if exists
if (isset($notes[$index])) {
    unset($notes[$index]);
    $notes = array_values($notes);
}

// Save updated notes
save_notes($notes);

// Redirect back
header('Location: ../public/index.php');
exit;