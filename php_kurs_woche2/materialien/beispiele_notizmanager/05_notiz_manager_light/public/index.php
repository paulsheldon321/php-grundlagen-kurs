<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/../inc/tools.php';

$notes = load_notes();

?>
<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Notiz-Manager Light</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
<header>
    <h1>Notiz-Manager Light</h1>
</header>

<main class="container">

    <!-- Add Note -->
    <h2>Neue Notiz</h2>
    <form action="../inc/add.php" method="post">
        <input type="text" name="title" placeholder="Titel" required>
        <textarea name="content" placeholder="Inhalt" required></textarea>
        <button type="submit">Hinzufügen</button>
    </form>

    <hr>

    <!-- List Notes -->
    <h2>Notizen</h2>

    <?php if ($notes): ?>
        <?php foreach ($notes as $i => $note): ?>
            <article class="post">
                <h3><?= htmlspecialchars($note['title']) ?></h3>
                <p><?= htmlspecialchars($note['content']) ?></p>

                <!-- Delete form with hidden input -->
                <form action="../inc/delete.php" method="post">
                    <input type="hidden" name="index" value="<?= $i ?>">
                    <button type="submit">Löschen</button>
                </form>
            </article>
        <?php endforeach; ?>

    <?php else: ?>
        <p>Keine Notizen vorhanden.</p>
    <?php endif; ?>

</main>
</body>
</html>