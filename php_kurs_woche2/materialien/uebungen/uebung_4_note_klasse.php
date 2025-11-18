<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
require_once __DIR__ . '/class/Note.php';

$path = file_get_contents(__DIR__ . '/notes.json');
$notesJson = json_decode($path, true);

$notes = [];
foreach ($notesJson as $note) {
    $notes[] = new Note($note['title'], $note['content']);
}

/**
 * Aufgabe:
 * 1) Definiere class Note (title, content, __construct).
 * 2) Erzeuge mehrere Objekte und gib sie in HTML aus.
 * 3) Optional: Lese Daten aus notes.json und wandle sie in Objekte um.
 */

?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 4 – Note-Klasse</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 4 – Note-Klasse</h1></header>
  <main class="container">
    <!-- TODO -->
     <?php foreach($notes as $n): ?>
    <article class="post">
      <h2><?= htmlspecialchars($n->getTitle()) ?></h2>
      <p><?= nl2br(htmlspecialchars($n->getcontent())) ?></p>
    </article>
  <?php endforeach; ?>
  </main>
</body>
</html>
