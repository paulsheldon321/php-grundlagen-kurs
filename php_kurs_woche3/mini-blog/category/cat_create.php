<?php
$pageTitle = 'Kategorie(s)';
include_once __DIR__ . '/../inc/_header.inc.php';
include_once __DIR__ . '/../inc/functions.inc.php'; // make sure addCategory() is included

$catName = $_POST['catName'] ?? '';
$catDesc = $_POST['catDesc'] ?? '';
$error = '';
$success = '';
$cats = fetchCategories($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic validation
    if (trim($catName) === '' || trim($catDesc) === '') {
        $error = 'Bitte alle Felder ausfüllen!';
    } else {
        // Call the function to insert into DB
        addCategory($pdo, $catName, $catDesc);
        $success = 'Kategorie erfolgreich erstellt!';
        // Optionally, clear the form fields
        $catName = '';
        $catDesc = '';
        $cats = fetchCategories($pdo);
    }
}
?>

<main class="container">

    <details class="custom-details">
        <summary>
            Klick mich ! 👈
        </summary>
        <section class="card" style="margin: 0; padding: 10px;">
            <form action="" method="post" style="display: flex; flex-direction: column; gap: 10px;">
                <label>Name:
                    <input type="text" name="catName" value="<?= htmlspecialchars($catName) ?>" required
                        style="padding: 6px; border-radius: 4px; border: 1px solid #ccc; width: 100%;">
                </label>
                <label>Beschreibung:
                    <textarea name="catDesc" rows="5" required
                        style="padding: 6px; border-radius: 4px; border: 1px solid #ccc; width: 100%;"><?= htmlspecialchars($catDesc) ?></textarea>
                </label>

                <div style="display: flex; gap: 6px; margin-top: 10px;">
                    <button type="submit" class="post-edit-btn">&#x2714;</button>

                    <button type="reset" class="post-delete-btn">&#10007;</button>
                </div>
            </form>
        </section>
    </details>
    <section class="card" style="padding: 1rem 2.3rem; width: 70%; margin: 0 auto;">
        <table style="
                margin: 0 auto;
                width: 70%;
                border-collapse: collapse;
                font-size: 0.95rem;
            ">
            <thead>
                <tr>
                    <th style="padding: 10px; text-align: center; width: 120px">Kategorie</th>
                    <th style="padding: 10px; text-align: center; width: 120px">Beschreibung</th>
                    <th style="padding: 10px; text-align: center; width: 120px;">Aktion</th>
                </tr>
            </thead>
            <?php foreach ($cats as $cat): ?>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td class="table-single-line"><?= htmlspecialchars($cat->categ_name) ?></td>
                    <td class="table-single-line"><?= htmlspecialchars($cat->categ_desc) ?></td>

                    <td style="padding: 6px; text-align: center; white-space: nowrap;">

                        <!-- Edit button -->
                        <a href="cat_edit.php?id=<?= $cat->categ_id ?>" class="post-edit-btn">
                            ✎
                        </a>

                        <!-- Delete button -->
                        <form action="../inc/_delete.inc.php" method="post" style="display: inline-flex; margin: 0;"
                            onsubmit="return confirm('Möchten Sie diesen Eintrag wirklich löschen?')">
                            <input type="hidden" name="catId" value="<?= $cat->categ_id ?>">
                            <button type="submit" class="post-delete-btn">
                                🗑
                            </button>
                            <input type="hidden" name="catId" value="<?= $cat->categ_id ?>">
                        </form>

                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </section>
</main>