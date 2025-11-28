<?php
declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/../../inc/db-connect.php';
require_once __DIR__ . '/../../inc/functions.php';

$id = (int)($_POST['id'] ?? 0);
$name = trim($_POST['name'] ?? '');

if ($id && $name !== '') {
  updateCategory($pdo, $id, $name);
}
header('Location: ../categ-manager.php');