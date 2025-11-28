<?php
$pageTitle = 'Kategorie';
include_once __DIR__ . '/../inc/_header.inc.php';


$id = (int)($_GET['id'] ?? 0);
$cat = fetchCategory($pdo, $id);
$name = $_POST['catName'] ?? '';
$desc = $_POST['catDesc'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateCategory($pdo, $id, $name, $desc);
    $cat = fetchCategory($pdo, $id);
    $success = 'Eintrag erfolgreich geändert!';
}

?>

<main class="container">
    <section class="card" style="margin: 0; padding: 10px;">
        <form action="" method="post" style="display: flex; flex-direction: column; gap: 10px;">
            <label>Name:
                <input type="text" name="catName" value="<?= htmlspecialchars($cat->categ_name) ?>" required
                    style="padding: 6px; border-radius: 4px; border: 1px solid #ccc; width: 100%;">
            </label>
            <label>Beschreibung:
                <textarea name="catDesc" rows="5" required
                    style="padding: 6px; border-radius: 4px; border: 1px solid #ccc; width: 100%;"><?= htmlspecialchars($cat->categ_desc) ?></textarea>
            </label>

            <div class="button-container">
                <button type="submit" class="action-btn button-submit">&#x2714;</button>
                <a href="cat_create.php" class="action-btn button-cancel">&#10007;</a>
            </div>
            <?php if (!empty($success)) : ?>
                <p><?= $success ?></p>
            <?php endif; ?>
        </form>
    </section>
</main>