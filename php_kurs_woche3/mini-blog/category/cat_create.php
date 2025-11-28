<?php
$pageTitle = 'Kategorie';
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

    <details style="
        width:70%;
        margin: 0 auto 20px auto; /* center to match table */
        border: 1px solid #ddd; 
        border-radius: 6px; 
        padding: 0; /* remove inner padding to match table width */
        background-color: #f9f9f9;
        font-size: 0.95rem;
    ">
        <summary style="
            cursor: pointer; 
            font-weight: bold; 
            font-size: 1.2rem; 
            padding: 8px 12px; 
            border-bottom: 1px solid #ddd;
            background-color: #FFFFFF; 
            color: white; 
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
            text-align: center;
            display: block; /* makes text-align work */
            color: black;
        ">
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
                    <button type="submit"
                        style="
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        width: 28px;
                        height: 28px;
                        font-size: 1rem;
                        background: #007bff;
                        color: white;
                        border-radius: 4px;
                        border: none;
                        cursor: pointer;
                        padding: 0;
                    ">&#x2714;</button>

                    <button type="reset"
                        style="
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        width: 28px;
                        height: 28px;
                        font-size: 1rem;
                        background: #d9534f;
                        color: white;
                        border-radius: 4px;
                        border: none;
                        cursor: pointer;
                        padding: 0;
                    ">&#10007;</button>
                </div>
            </form>
        </section>
    </details>

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
                <td style="padding: 10px; text-align: center;"><?= htmlspecialchars($cat->categ_name) ?></td>
                <td style="padding: 10px; text-align: center;"><?= htmlspecialchars($cat->categ_desc) ?></td>
                <td style="padding: 6px; text-align: center; white-space: nowrap;">

                    <!-- Edit button -->
                    <a href="cat_edit.php?id=<?= $cat->categ_id ?>"
                        style="
                display: inline-flex;
                justify-content: center;
                align-items: center;
                width: 28px;
                height: 28px;
                font-size: 1rem;
                background: #007bff;
                color: white;
                border-radius: 4px;
                text-decoration: none;
                margin-right: 4px;
            ">
                        ✎
                    </a>

                    <!-- Delete button -->
                    <form action="../inc/_delete.inc.php" method="post" style="display: inline-flex; margin: 0;"
                        onsubmit="return confirm('Möchten Sie diesen Eintrag wirklich löschen?')">
                        <input type="hidden" name="catId" value="<?= $cat->categ_id ?>">
                        <button type="submit"
                            style="
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    width: 28px;
                    height: 28px;
                    font-size: 1rem;
                    background: #d9534f;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    padding: 0;
                ">
                            🗑
                        </button>
                        <input type="hidden" name="catId" value="<?= $cat->categ_id ?>">
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</main>