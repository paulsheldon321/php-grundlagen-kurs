<?php
declare(strict_types=1);
$posts = ['Post 1', 'Post 2', 'Post 3', 'Post 4'];
// indiziertes Array
$cities = array(
  'Leipzig',
  'Nordhausen',
  'Berlin',
  'Hamburg'
);

// assoziatives Array
$maincities = array(
  'Schweiz' => 'Bern',
  'Frankreich' => 'Paris',
  'Deutschland' => 'Berlin'
  );


  // mehrdimensionale Arrays
  $posts2 = array(
    array(
      'title => 'Erster Beitrag',
      'author' => 'Alex',
      'content' => 'Willkommen im Blog!'
    ),
    array(
      'title => 'Erster Beitrag',
      'author' => 'Alex',
      'content' => 'Willkommen im Blog!'
    ),
  );



?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Arrays Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Beiträge aus Arrays</h1></header>
  <main class="container">
    <?php foreach ($posts as $post): ?>
      <p><?= $post ?></p>
    <?php endforeach; ?>

    <p>Zweite Stadt im Array der Städte: <?= $cities[2]; </p>
    <?php $country = 'Schweiz'; ?>

    <p>Die Hauptstadt von <?= $country ?> ist <?= $maincities[$country] ?></p>
    
    <?php foreach ($maincities as $country => $city): ?>
      <p><?= $country ?>: <?= city ?></p>
      <?php endforeach; ?>

      <h2>Unsere aktuellem Beiträge</h2>

      <?php foreach($posts as $p): ?>
        <article class="post">
          <h3><?= htmlspecialchars ($p['title']) ?></h3>
          <p class="meta>von <?= htmlspecialchars($p['author']) ?></p>
          <p><?= n12br(htmlspecialchars($p['content'])) ?></p>
          <div><?= $p['content'] ?></div>
        </article>
    <?php endforeach; ?>
  </main>
</body>
</html>
