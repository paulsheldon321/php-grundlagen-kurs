<?php
include_once __DIR__ . '/../inc/_header.inc.php';
include_once __DIR__ . '/../inc/functions.inc.php';

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    die('Ungültige Post-ID!');
}

$post = fetchPost($pdo, $id);
?>


<main class="container">
    <h2>Post-Ansicht</h2>
    <section class="card">
        <article>
            <!-- Überschrift -->
            <h4><?= htmlspecialchars($post->posts_header) ?></h4>

            <!-- Header-Bereich mit Meta-Daten und optionalem Bild -->
            <div style="display: flex; align-items: flex-start; gap: 20px; margin-bottom: 1em;">
                <!-- Meta-Daten links -->
                <small style="flex: 1;">
                    Autor: <?= htmlspecialchars($_SESSION['email'] ?? 'Unbekannt') ?><br>
                    Kategorie: <?= htmlspecialchars(fetchCategoryName($pdo, $post->posts_categ_id_ref) ?? 'Keine') ?><br>
                    Erstellt am: <?= date('d.m.Y H:i', strtotime($post->posts_created_at)) ?><br>
                    Geändert am: <?= $post->posts_updated_at ? date('d.m.Y H:i', strtotime($post->posts_updated_at)) : '–' ?>
                </small>

                <!-- Bild rechts -->
                <?php if (!empty($post->posts_image)): ?>
                    <img src="<?= BASE_URL . 'images/' . htmlspecialchars($post->posts_image) ?>"
                        alt="Post-Bild"
                        style="max-width: 200px; height: auto;">
                <?php endif; ?>
            </div>

            <!-- Artikelinhalt -->
            <p><?= nl2br(htmlspecialchars($post->posts_content)) ?></p>
        </article>
        <a href="post_create.php">Zurück</a>
    </section>

</main>