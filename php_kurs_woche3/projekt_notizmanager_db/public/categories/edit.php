<?php
include_once '../header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$category = $id ? findCategory($pdo, $id) : null;
if(!$category) { header('Location: ../categ-manager.php'); exit; }
?>

  <main class="container">
    <form action="update.php" method="post">
      <input type="hidden" name="id" value="<?= (int)$category->id ?>">
      <label>Kategorie-Name <input type="text" name="name" value="<?= safe($category->name) ?>" required></label>
      <button type="submit">Speichern</button>
      <a href="../categ-manager.php" class="button">Abbrechen</a>
    </form>
  </main>

<?php include_once '../footer.php'; ?>