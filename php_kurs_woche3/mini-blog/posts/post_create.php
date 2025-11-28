<?php

$pageTitle = 'Posts'; // MUST be set before including header

include_once __DIR__ . '/../inc/_header.inc.php';
include_once __DIR__ . '/../inc/functions.inc.php'; // make sure addPost() and fetchCat() are included

$header = $_POST['header'] ?? '';
$content = $_POST['content'] ?? '';
$catId = (int)($_POST['catId'] ?? 0);
$imageFilename = ''; // uploaded file name
$error = '';
$success = '';
$userId = getUserId($pdo, $_SESSION['email'] ?? '');
$cats = fetchCategories($pdo);


$posts = fetchPosts($pdo);

$upload_dir = __DIR__ . '/../images/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true); // create folder if not exists

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Basic validation
    if ($catId <= 0 || trim($header) === '' || trim($content) === '') {
        $error = 'Bitte alle Felder ausfüllen!';
    } else {
        // Handle file upload
        if (!empty($_FILES['datei']) && $_FILES['datei']['error'] === UPLOAD_ERR_OK) {
            $allowed_files = [
                'image/jpeg' => 'jpg',
                'image/png'  => 'png',
                'image/gif'  => 'gif'
            ];

            $type = mime_content_type($_FILES['datei']['tmp_name']);
            if (isset($allowed_files[$type]) && filesize($_FILES['datei']['tmp_name']) <= 2000000) {
                $ext = $allowed_files[$type];
                $imageFilename = md5(uniqid($_FILES['datei']['tmp_name'], true)) . '.' . $ext;
                $upload_path = $upload_dir . $imageFilename;

                if (!move_uploaded_file($_FILES['datei']['tmp_name'], $upload_path)) {
                    $error = 'Fehler beim Hochladen der Datei!';
                }
            } else {
                $error = 'Ungültiger Dateityp oder Datei zu groß.';
            }
        }

        // If no error, insert post
        if ($error === '') {
            addPost($pdo, $userId, $catId, $header, $content, $imageFilename);
            $success = 'Beitrag erfolgreich erstellt!';
            // Clear form
            $header = '';
            $content = '';
            $catId = 0;
            $imageFilename = '';
        }
    }
}

?>

<main class="container">
    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

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
            <form action="" method="post" enctype="multipart/form-data">
                <label>Kategorie:</label>
                <select name="catId" required>
                    <option value="" disabled <?= $catId == 0 ? 'selected' : '' ?>>--Bitte eine Kategorie auswählen--</option>
                    <?php foreach ($cats as $cat): ?>
                        <option value="<?= $cat->categ_id ?>" <?= $catId == $cat->categ_id ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cat->categ_name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label>Header:
                    <input type="text" name="header" value="<?= htmlspecialchars($header) ?>">
                </label>

                <label>Content:
                    <textarea id="content" name="content" rows="20"><?= htmlspecialchars($content) ?></textarea>
                </label>

                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <label>Bild hochladen (*.jpg, *.png, *.gif):
                    <input name="datei" type="file" accept="image/gif,image/jpeg,image/png">
                </label>

                <div class="button-container">
                    <button type="submit" class="action-btn button-submit">&#x2714;</button>
                    <button type="reset" class="action-btn button-cancel">&#10007;</button>
                </div>
            </form>
        </section>
    </details>
    <?php if ($_SESSION): ?>

        <table style="
                margin: 0 auto;
                width: 70%;
                border-collapse: collapse;
                font-size: 0.95rem;
            ">
            <thead>
                <tr>
                    <th style="padding: 10px; text-align: center; width: 120px;">Titel</th>
                    <th style="padding: 10px; text-align: center; width: 120px;">Kategorie</th>
                    <th style="padding: 10px; text-align: center; width: 120px;">Aktion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $p): ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; text-align: center;">
                            <a href="post_single.php?id=<?= $p->posts_id ?>"
                                style="text-decoration: none; color: #2a7fde;">
                                <?= htmlspecialchars($p->posts_header) ?>
                            </a>
                        </td>
                        <td style="padding: 10px; text-align: center;">
                            <?= fetchCategoryName($pdo, $p->posts_categ_id_ref) ?>
                        </td>
                        <td style="padding: 6px; text-align: center; white-space: nowrap;">

                            <!-- Edit button -->
                            <a href="post_edit.php?id=<?= $p->posts_id ?>"
                                style="
                       display: inline-flex;
                       justify-content: center;
                       align-items: center;
                       width: 28px;
                       height: 28px;
                       font-size: 1rem;
                       background-color: #007bff;
                       color: white;
                       border-radius: 4px;
                       text-decoration: none;
                       margin-right: 4px;
                   ">
                                ✎
                            </a>

                            <!-- Delete button -->
                            <form action="inc/_delete.inc.php" method="post" style="display: inline-flex; margin: 0;"
                                onsubmit="return confirm('Möchten Sie diesen Eintrag wirklich löschen?')">
                                <input type="hidden" name="postId" value="<?= $p->posts_id ?>">
                                <button type="submit"
                                    style="
                            display: inline-flex;
                            justify-content: center;
                            align-items: center;
                            width: 28px;
                            height: 28px;
                            font-size: 1rem;
                            background-color: #d9534f;
                            color: white;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            padding: 0;
                        ">
                                    🗑
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>