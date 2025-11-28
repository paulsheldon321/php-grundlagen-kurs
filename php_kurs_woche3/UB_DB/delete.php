<?php
declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/inc/functions.php';

$artnr = ($_POST['artnummer']) ?? '';

if($artnr) { deleteHardware($pdo, $artnr); }

header('Location: index.php');