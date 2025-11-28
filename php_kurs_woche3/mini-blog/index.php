<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
include_once __DIR__ . '/inc/_header.inc.php';
include_once __DIR__ . '/inc/functions.inc.php';

$posts = [];
if (!empty($_SESSION['email'])) {
    $userId = getUserId($pdo, $_SESSION['email']);
    $posts = fetchPostFromUser($pdo, $userId);
    $user = fetchUser($pdo, $userId);
}

$categoryColors = [];
foreach ($posts as $post) {
    $categoryName = fetchCategoryName($pdo, $post->posts_categ_id_ref) ?? 'default';

    // Assign a color if it hasn’t been assigned yet
    if (!isset($categoryColors[$categoryName])) {
        // Cycle through a predefined set of colors
        $colors = ['border-blue', 'border-green', 'border-orange', 'border-purple', 'border-red'];
        $categoryColors[$categoryName] = $colors[count($categoryColors) % count($colors)];
    }
}



?>

<main class="container">
    <?php if ($_SESSION): ?>
        <p>Hallo <b><?= $user->users_forename ?></b>, willkommen zu deinem Blog!</p>


    <?php else: ?>
        <p> Einloggen und dein Mini-Blog starten</p>
    <?php endif; ?>

    <?php foreach ($posts as $post): ?>
        <?php
        $categoryName = fetchCategoryName($pdo, $post->posts_categ_id_ref) ?? 'default';
        $borderClass = $categoryColors[$categoryName] ?? 'border-default';
        ?>

        <section class="card" style="padding: 1rem 2.3rem 1rem 2.3rem;"> <!-- padding : top - right - buttom - left -->
            <article>
                <div style="padding-bottom: 0.5rem; padding-left:0.5rem;"><strong><?= htmlspecialchars($post->posts_header) ?></strong></div>
                <div class="post-row">
                    <!-- Left content: header + meta -->


                    <div class="post-meta <?= $borderClass ?>">
                        <small>
                            Autor: <?= htmlspecialchars($_SESSION['email'] ?? 'Unbekannt') ?><br>
                            Kategorie: <?= htmlspecialchars($categoryName) ?><br>
                            Erstellt am: <?= date('d.m.Y H:i', strtotime($post->posts_created_at)) ?><br>
                            Geändert am: <?= $post->posts_updated_at ? date('d.m.Y H:i', strtotime($post->posts_updated_at)) : '–' ?>
                        </small>
                    </div>

                    <!-- Right image -->
                    <?php if (!empty($post->posts_image)): ?>
                        <div class="post-image-wrapper">
                            <img src="<?= BASE_URL . 'images/' . htmlspecialchars($post->posts_image) ?>"
                                alt="Post-Bild">
                        </div>
                    <?php endif; ?>
                </div>

                <p class="post-content"><?= nl2br(htmlspecialchars($post->posts_content)) ?></p>
            </article>

            <a href="posts/post_edit.php?id=<?= $post->posts_id ?>"
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
                <input type="hidden" name="postId" value="<?= $post->posts_id ?>">
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
        </section>
    <?php endforeach; ?>

</main>



<?php include_once __DIR__ . '/inc/_footer.inc.php' ?>