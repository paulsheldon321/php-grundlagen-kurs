<?php

declare(strict_types=1);

?>
<!doctype html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Eintrag bearbeiten</title>
  <link rel="stylesheet" href="../style/style.css">
</head>

<body>
  <main class="container">
    <h1>Eintrag bearbeiten</h1>
    <form method="post" action="update.php">
      <input type="hidden" name="id">
      <label>Titel <input name="title" required></label>
      <label>Inhalt <textarea name="content" rows="5" required></textarea></label>
      <label>Kategorie
        <select name="category_id">
          <option value="">– keine –</option>

        </select>
      </label>
      <button>Speichern</button>
      <a class="button" href="index.php">Abbrechen</a>
    </form>
  </main>
</body>

</html>