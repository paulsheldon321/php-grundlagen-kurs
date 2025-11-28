<?php 
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'connect.php'; // Verbindung zum SQL-SERVER
require_once __DIR__ .'/inc/functions.php'; // Funktion includieren zum Beispiel: getHardware()

$hardware = getHardware($pdo); // Inhalt aus der Tabelle holen
$filter = filterHardware($pdo, 60, 150);
$filterMonat = filterMonth($pdo, 6);
$radio = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $radio = findHardware($pdo);   // always call BEFORE HTML
}

// Handle addHardware form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hersteller'])) {

    $hersteller = trim($_POST['hersteller']);
    $typ        = trim($_POST['typ']);
    $gb         = (int)$_POST['gb'];
    $preis      = (float)$_POST['preis'];
    $artnummer  = trim($_POST['artnummer']);
    $prod       = $_POST['prod'];

    // Check if artnummer already exists
    $check = $pdo->prepare("SELECT 1 FROM fp WHERE artnummer = :artnummer");
    $check->execute([':artnummer' => $artnummer]);

    if ($check->fetch()) {
        echo '<p style="color:red;">Fehler: Diese Artikelnummer existiert bereits!</p>';
    } else {
        addHardware($pdo, $hersteller, $typ, $gb, $preis, $artnummer, $prod);
        echo '<p style="color:green;">Hardware erfolgreich hinzugefügt!</p>';
        $hardware = getHardware($pdo); // Inhalt aus der Tabelle holen
        header("Refresh: 3; URL=" . $_SERVER['PHP_SELF']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hardware</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container">
        <section class="card">
            <details>
                <summary>Hardware einfügen</summary>
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    
                    <span>
                        <label for="hersteller">Hersteller</label>
                        <input type="text" id="hersteller" name="hersteller" required>
                    </span>

                    <span>
                        <label for="typ">Typ</label>
                        <input type="text" id="typ" name="typ" required>
                    </span>

                    <span>
                        <label for="gb">GB</label>
                        <input type="number" id="gb" name="gb" min="1" required>
                    </span>

                    <span>
                        <label for="preis">Preis (€)</label>
                        <input type="number" id="preis" name="preis" step="0.01" min="0" required>
                    </span>

                    <span>
                        <label for="artnummer">Artikelnummer</label>
                        <input type="text" id="artnummer" name="artnummer" required>
                    </span>

                    <span>
                        <label for="prod">Produktionsdatum</label>
                        <input type="date" id="prod" name="prod" required>
                    </span>
                    <div class="form-actions">
                    <button type="submit">Hinzufügen</button>
                    <button type="reset">Zurücksetzen</button>
                    </div>
                </form>
            </details>
        </section>

        <section class="card">
            <table>
                <thead>
                    <th>Hersteller</th>
                    <th>Typ</th>
                    <th>GB</th>
                    <th>Preis</th>
                    <th>Artikelnummer</th>
                    <th>Produktionsdatum</th>
                </thead>
                <!-- Schleife, um Daten aus der Tabelle in eine Reihe hinzufügen -->
                <?php foreach ( $hardware as $item): ?>
                    <tr>
                        <td><?= $item->hersteller ?></td>
                        <td><?= $item->typ ?></td>
                        <td><?= $item->gb ?></td>
                        <td><?= $item->preis ?></td>
                        <td><?= $item->artnummer ?></td>
                        <td><?= $item->prod ?></td>
                        <td>
                            <!-- Buttons container -->
                            <div class="form-actions">
                                <a href="edit.php?artnr=<?= $item->artnummer ?>" class="button">Bearbeiten</a>
                                <form action="delete.php" method="post">
                                <input type="hidden" name="artnummer" value="<?= $item->artnummer ?>">
                                <button type="submit" class="button text-danger">Löschen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
        


        <section class="card">
            <h2>Filter GB > 60 und Preis < 150</h2>
            <table>
                    <thead>
                        <th>Hersteller</th>
                        <th>Typ</th>
                        <th>GB</th>
                        <th>Preis</th>
                        <th>Artikelnummer</th>
                        <th>Produktionsdatum</th>
                    </thead>
                    <?php foreach ( $filter as $item): ?>
                        <tr>
                            <td><?= $item->hersteller ?></td>
                            <td><?= $item->typ ?></td>
                            <td><?= $item->gb ?></td>
                            <td><?= $item->preis ?></td>
                            <td><?= $item->artnummer ?></td>
                            <td><?= $item->prod ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
        </section>

        <section class="card">
            <h2>ersten Halbjahr</h2>
                <table>
                    <thead>
                        <th>Hersteller</th>
                        <th>Typ</th>
                        <th>GB</th>
                        <th>Preis</th>
                        <th>Artikelnummer</th>
                        <th>Produktionsdatum</th>
                    </thead>
                    <?php foreach ( $filterMonat as $item): ?>
                        <tr>
                            <td><?= $item->hersteller ?></td>
                            <td><?= $item->typ ?></td>
                            <td><?= $item->gb ?></td>
                            <td><?= $item->preis ?></td>
                            <td><?= $item->artnummer ?></td>
                            <td><?= $item->prod ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
        </section>

        <section class="card">        
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <h2>Radiobox</h2>

                <span class="radio-checkbox">
                    <input type="radio" name="preis" id="preis_a" value="a">
                    <label for="preis_a">bis 120€ einschl.</label>
                </span>

                <span class="radio-checkbox">
                    <input type="radio" name="preis" id="preis_b" value="b">
                    <label for="preis_b">ab 120€ auschl. bis 140€ einschl.</label>
                </span>

                <span class="radio-checkbox">
                    <input type="radio" name="preis" id="preis_c" value="c">
                    <label for="preis_c">ab 140€ ausschl.</label>
                </span>

                <span class="radio-checkbox">
                    <input type="checkbox" name="d" id="d">
                    <label for="d">Ausgabe nach Preis (absteigend) sortiert</label>
                </span>

                <div class="form-actions">
                    <button type="submit">Senden</button>
                    <button type="reset">Zurücksetzen</button>
                </div>
            </form>



        </section>

        <?php if(!empty($radio)): ?>
            <section class="card">
                <h2>Ergebnis</h2>
                
                <table>
                    <thead>
                        <th>Hersteller</th>
                        <th>Typ</th>
                        <th>Preis</th>
                    </thead>
                    <?php foreach ( $radio as $item): ?>
                    <tr>
                        <td><?= $item->hersteller ?></td>
                        <td><?= $item->typ ?></td>
                        <td><?= $item->preis ?> Euro</td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        <?php endif; ?>
    </main>
</body>
</html>