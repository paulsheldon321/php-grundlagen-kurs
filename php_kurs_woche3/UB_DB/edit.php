<?php 
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/inc/functions.php';
$artnr = isset($_GET['artnr']) ? $_GET['artnr'] : '';
$hardware = $artnr ? findHardwareByArtnr($pdo, $artnr) : null;

if (!$hardware) {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hardware editieren</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <header>
        <h1>Hardware editieren</h1>
    </header>
    <main class="container">
        <section class="card">
            <form action="update.php" method="post">
                <span>
                    <label for="hersteller">Hersteller</label>
                    <input type="text" id="hersteller" name="hersteller" required value="<?= $hardware->hersteller ?>">
                </span>
                <span>
                    <label for="typ">Typ</label>
                    <input type="text" id="typ" name="typ" required value="<?= $hardware->typ ?>">
                </span>
                <span>
                    <label for="gb">GB</label>
                    <input type="number" id="gb" name="gb" min="1" required value="<?= $hardware->gb ?>">
                </span>
                <span>
                    <label for="preis">Preis (€)</label>
                    <input type="number" id="preis" name="preis" step="0.01" min="0" required value="<?= $hardware->preis ?>">
                </span>
                <span>
                    <label for="artnummer">Artikelnummer</label>
                    <input type="text" id="artnummer" name="artnummer" required value="<?= $hardware->artnummer ?>">
                    <input type="hidden" name="original_artnr" value="<?= $hardware->artnummer ?>">
                </span>
                <span>
                    <label for="prod">Produktionsdatum</label>
                    <input type="date" id="prod" name="prod" required value="<?= $hardware->prod ?>">
                </span>

                <!-- Buttons container -->
                <div class="form-actions">
                    <button type="submit">Speichern</button>
                    <a href="index.php" class="button">Zurück</a>
                </div>
            </form>

        </section>
    </main>
</body>
</html>