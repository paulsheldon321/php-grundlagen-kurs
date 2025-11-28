<nav>
    <div class="container">
        <ul>
            <li><a href="<?= BASE_URL ?>index.php">Startseite</a></li>
            <?php if (isset($_SESSION['email'])): ?>
                <li><a href="<?= BASE_URL ?>posts/post_create.php">Post(s)</a></li>
                <li><a href="<?= BASE_URL ?>category/cat_create.php">Kategorie(s)</a></li>
            <?php endif; ?>
            <?php if (empty($_SESSION['email'])): ?>
                <li><a href="<?= BASE_URL ?>user/register.php">Registrieren</a></li>
            <?php endif; ?>
        </ul>
        <div class="text-muted">
            <?php if (!empty($_SESSION['email'])): ?>
                Eingeloggt als <strong><?= safe($_SESSION['email']) ?></strong> - <a href="<?= BASE_URL ?>user/logout.php">Logout</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>user/login.php">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>