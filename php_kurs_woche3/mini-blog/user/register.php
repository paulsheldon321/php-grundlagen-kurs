<?php
$pageTitle = 'Registrieren'; // MUST be set before including header

include_once __DIR__ . '/../inc/_header.inc.php';

$error = '';
$forename = '';
$lastname = '';
$email = '';
$password = '';
$passwordRepeat = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $forename = trim($_POST['forename'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = (string)($_POST['password'] ?? '');
    $passwordRepeat = (string)($_POST['password_repeat'] ?? '');

    if ($forename === '' || $password === '' || $passwordRepeat === '' || $email === '' || $lastname === '') {
        $error = 'Bitte alle Felder ausfüllen!';
    } elseif (mb_strlen($password) < 3) {
        $error = 'Das Passwort muss mindestens 3 Zeichen lang sein!';
    } elseif ($password !== $passwordRepeat) {
        $error = 'Die beiden Passwörter stimmen nicht überein!';
    } else {
        // Check if user exists
        $stmt = $pdo->prepare('SELECT users_id FROM users WHERE users_email = ?');
        $stmt->execute([$email]);
        $existing = $stmt->fetch();

        if (!$existing) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO users (users_forename, users_lastname, users_email, users_password) VALUES (?, ?, ?, ?)');
            if ($stmt->execute([$forename, $lastname, $email, $hash])) {
                $_SESSION['forename'] = $forename;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['email'] = $email;
                header('Location: ' . BASE_URL . 'index.php'); // use BASE_URL
                exit;
            } else {
                $error = 'Beim Anlegen des Benutzers ist ein Fehler aufgetreten!';
            }
        } else {
            $error = 'Der Benutzername existiert bereits!';
        }
    }
}

?>

<main class="container">
    <section class="card">
        <h2>Neue Benutzer registrieren!</h2>
        <form action="" method="post">
            <label>Vorname:
                <input type="text" name="forename" required value="<?= safe($forename) ?>">
            </label>
            <label>Nachname:
                <input type="text" name="lastname" required value="<?= safe($lastname) ?>">
            </label>
            <label>Email:
                <input type="text" name="email" required value="<?= safe($email) ?>">
            </label>
            <label>Passwort:
                <input type="password" name="password" required>
            </label>
            <label>Passwort wiederholen:
                <input type="password" name="password_repeat" required>
            </label>
            <button type="submit">Registrieren</button>
        </form>
    </section>
</main>