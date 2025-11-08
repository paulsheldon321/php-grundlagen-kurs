<?php

declare(strict_types=1);

?>
<!doctype html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="../style/style.css">
</head>

<body>
  <main class="container">
    <h1>Login</h1>
    
    <form method="post">
      <label>Benutzername <input name="username" required></label>
      <label>Passwort <input type="password" name="password" required></label>
      <button>Anmelden</button>
      <a class="button" href="index.php">Zurück</a>
    </form>
    <p class="text-muted">Demo‑User: <code>admin</code> / <code>admin123</code> (nach Import aus SQL‑Dump)</p>
  </main>
</body>

</html>