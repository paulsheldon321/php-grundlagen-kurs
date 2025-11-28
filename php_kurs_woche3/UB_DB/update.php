<?php
declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors', true);



require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/inc/functions.php';

$hersteller = trim($_POST['hersteller']);
$typ        = trim($_POST['typ']);
$gb         = (int)$_POST['gb'];
$preis      = (float)$_POST['preis'];
$artnummer  = trim($_POST['artnummer']);
$prod       = $_POST['prod'];
$orgNr = trim($_POST['original_artnr'] ?? '');



if ($hersteller && $typ !== '' && $artnummer !== '' && $orgNr !== '') {
    updateHardware($pdo, $hersteller, $typ, $gb, $preis, $artnummer, $prod, $orgNr);
}
 
header('Location: index.php');