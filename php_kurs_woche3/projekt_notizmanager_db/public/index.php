<?php

declare(strict_types=1);

?>
<!doctype html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Notiz‑Manager DB</title>
  <link rel="stylesheet" href="../style/style.css">
</head>

<body>
  <header>
    <div class="container">
      <h1>Notiz‑Manager DB</h1>
      <div class="text-muted">
        
      </div>
    </div>
  </header>

  <main class="container">
    <section class="card">
      <h2>Neue Notiz</h2>
      <form method="post" action="add.php">
        <label>Titel <input name="title" required></label>
        <label>Inhalt <textarea name="content" rows="4" required></textarea></label>
        <label>Kategorie
          <select name="category_id">
            <option value="">– keine –</option>
            
          </select>
        </label>
        <button>Speichern</button>
      </form>
    </section>

    <section class="card">
      <h2>Einträge</h2>
      <table>
        <thead>
          <tr>
            <th>Titel</th>
            <th>Kategorie</th>
            <th>Datum</th>
            <th>Aktionen</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </section>
  </main>
</body>

</html>