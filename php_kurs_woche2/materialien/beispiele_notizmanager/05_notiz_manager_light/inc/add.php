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

// Get form data
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');

if ($title === '' || $content === '') {
    header('Location: /public/index.php');
    exit;
}

// Add new note
$notes[] = [
    'title'   => $title,
    'content' => $content
];

// Save
save_notes($notes);

// Redirect back
header('Location: ../public/index.php');
exit;