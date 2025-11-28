<?php

$pageTitle = 'Registrieren';
include_once __DIR__ . '/../inc/_header.inc.php';


$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $e = trim($_POST['email'] ?? '');
    $p = trim($_POST['password'] ?? '');

    if ($e !== '' && $p !== '') {
        if (authenticate($pdo, $e, $p)) {
            $_SESSION['email'] = $e;
            header('Location: ' . BASE_URL . 'index.php');
            exit;
        } else {
            $error = 'Login fehlgeschlagen';
        }
    } else {
        $error = 'Bitte alle Felder ausfüllen';
    }
}
?>
<main class="container">
    <section class="card">
        <?php if ($error): ?>
            <p class="alert"><?= safe($error) ?></p>
        <?php endif; ?>
        <h2>Anmelden</h2>
        <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <label>Email-Adresse:
                <input type="text" name="email" required>
            </label>
            <label>Passwort:
                <input type="password" name="password" required>
            </label>
            <button type="submit">Login</button>
            <a href="index.php">Zurück auf Los!</a>
        </form>
    </section>
</main>