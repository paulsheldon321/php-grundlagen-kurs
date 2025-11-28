<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/db.inc.php';
require_once __DIR__ . '/../inc/functions.inc.php';

$postId = (int)($_POST['postId'] ?? '');

if ($postId) {
    deletePost($pdo, $postId);
    header('Location: ../index.php');
    exit;
}


$catId = (int)($_POST['catId'] ?? '');
if ($catId) {
    deleteCat($pdo, $catId);
    header('Location: ../category/cat_create.php');
    exit;
}
