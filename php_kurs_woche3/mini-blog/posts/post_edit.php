<?php
include_once __DIR__ . '/../inc/_header.inc.php';
include_once __DIR__ . '/../inc/functions.inc.php';

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    die('Ungültige Post-ID!');
}

$post = fetchPost($pdo, $id);
$cats = fetchCategories($pdo);

$error = '';
$success = '';

// Standardwerte für das Formular
$header  = $post->posts_header;
$content = $post->posts_content;
$catId   = $post->posts_categ_id_ref;
$oldImage = $post->posts_image; // Wichtig für "Bild behalten"


// 🟦 Wenn POST → Update ausführen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $header  = trim($_POST['header'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $catId   = (int)($_POST['catId'] ?? 0);
    $imageFilename = $oldImage;

    if ($header === '' || $content === '' || $catId <= 0) {
        $error = 'Bitte alle Felder ausfüllen!';
    } else {

        // 🔵 Falls neues Bild hochgeladen wurde → validieren & speichern
        if (!empty($_FILES['datei']) && $_FILES['datei']['error'] === UPLOAD_ERR_OK) {
            $allowed = [
                'image/jpeg' => 'jpg',
                'image/png'  => 'png',
                'image/gif'  => 'gif'
            ];

            $type = mime_content_type($_FILES['datei']['tmp_name']);

            if (isset($allowed[$type])) {

                $newName = md5(uniqid('', true)) . '.' . $allowed[$type];
                $target = realpath(__DIR__ . '/../images') . '/' . $newName;

                if (move_uploaded_file($_FILES['datei']['tmp_name'], $target)) {

                    // Neues Bild übernehmen
                    $imageFilename = $newName;

                    // 🔥 Altes Bild löschen (nur wenn vorhanden)
                    if (!empty($oldImage)) {
                        $oldPath = realpath(__DIR__ . '/../images/' . $oldImage);

                        // Sicherheit: nur löschen, wenn Datei im images-Ordner liegt
                        $imagesDir = realpath(__DIR__ . '/../images');

                        if ($oldPath !== false && strpos($oldPath, $imagesDir) === 0 && file_exists($oldPath)) {
                            unlink($oldPath); // Datei löschen
                        }
                    }
                } else {
                    $error = 'Fehler beim Hochladen!';
                }
            } else {
                $error = 'Ungültiger Dateityp!';
            }
        }

        // Wenn kein Fehler → Update ausführen
        if ($error === '') {
            updatePost($pdo, $id, $catId, $header, $content, $imageFilename);
            $success = 'Post erfolgreich aktualisiert!';
            header('Location: ../index.php');
        }
    }
}
?>

<main class="container">
    <h2>Post bearbeiten</h2>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <section class="card">
        <form action="" method="post" enctype="multipart/form-data">

            <label>Kategorie:</label>
            <select name="catId" required>
                <?php foreach ($cats as $c): ?>
                    <option value="<?= $c->categ_id ?>"
                        <?= $c->categ_id == $catId ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c->categ_name) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Header:
                <input type="text" name="header" value="<?= htmlspecialchars($header) ?>">
            </label>

            <label>Content:
                <textarea name="content" rows="20"><?= htmlspecialchars($content) ?></textarea>
            </label>

            <p>Aktuelles Bild:</p>
            <?php if ($oldImage): ?>
                <img src="<?= BASE_URL . 'images/' . htmlspecialchars($oldImage) ?>"
                    alt="Post-Bild"
                    style="max-width: 200px;">
            <?php else: ?>
                <p><em>Kein Bild vorhanden</em></p>
            <?php endif; ?>

            <label>Neues Bild hochladen:
                <input type="file" name="datei" accept="image/*">
            </label>

            <div class="button-container">
                <button type="submit" class="action-btn button-submit">&#x2714;</button>
                <a href="../index.php" class="action-btn button-cancel">&#10007;</a>
            </div>

        </form>
    </section>
</main>