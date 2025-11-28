<?php

declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors', true);
session_start();

define('BASE_URL', '/phpkurs/php_kurs_woche3/mini-blog/');

require_once __DIR__ . '/db.inc.php';
require_once __DIR__ . '/functions.inc.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Mini-Blog' ?></title>


    <!-- Load CSS via PHP proxy -->
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">


    <!-- Example icon -->
    <link rel="icon" type="image/svg+xml" href="<?= BASE_URL ?>../icon/hardware.svg">
</head>

<body>
    <?php include_once '_nav.inc.php' ?>
    <header>
        <div class="container">
            <h1 style="text-align: center;"><?= $pageTitle ?? 'Mini-Blog' ?></h1>

        </div>
    </header>

    <script>
        function confirmDelete() {
            return confirm('Möchten Sie diesen Eintrag wirklich löschen?');
        }
    </script>