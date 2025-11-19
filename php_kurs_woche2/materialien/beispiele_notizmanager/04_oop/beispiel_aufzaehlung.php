<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);

/**
 * einfache Aufzählung (Enumeration)
 */
enum Skat {
    case Eichel;
    case Gras;
    case Herz;
    case Schelle;

    function getName() {
        return $this->name;
    }
}

/**
 * gesicherte Aufzählung (backed enumeration)
 * Typhinweis darf *ausschließlich* int oder string sein
 * ein vorhandener Wert kann nicht an ein weiteres Element vergeben werden
 * Aufzählungen besitzen grundsätzlich eine schreibgeschützte Eigenschaft name
 * gesicherte Aufzählungen besitzen zusätzlich noch die Eigenschaft value
 */
enum Status: string {
    case undone = 'offen';
    case send = 'gesendet';
    case done = 'abgeschlossen';

    //Dies wird nicht functioniert: Fatal error
    // case succes = 'abgeschlossen';
    case succes = 'abgeschlossen';
}

function getStatus(Status $stat) {
    return "NAme: $stat->name, Wert: $stat->value";
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aufzählung (enum)</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Aufzählung (enum)</h1>
    </header>
    <main class="container">
    <h2>einfache Aufzählung</h2>
    <p><?= SAkat::Herz->getName() ?> ist Trumpf</p>

    <h2>gesicherte Aufzählungen</h2>
    <p><?= getStatus(Status::send) ?></p>
    </main>
</body>
</html>