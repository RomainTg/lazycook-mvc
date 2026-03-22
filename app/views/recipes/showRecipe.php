<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Navbar (même que index) -->

  <main class="flex-grow-1">
    <div class="container mt-5" style="max-width: 800px;">

      <a href="/lazycooking/public/RecipesController/index" style="color:#e78277; font-size:13px; text-decoration:none;">← Retour aux recettes</a>

      <h1 class="mt-3"><?= htmlspecialchars($recipe->title) ?></h1>

      <?php if (!empty($recipe->cooking_time)) : ?>
        <p class="text-muted">⏱️ <?= htmlspecialchars($recipe->cooking_time) ?> min</p>
      <?php endif; ?>

      <?php if (!empty($recipe->description)) : ?>
        <p class="lead"><?= htmlspecialchars($recipe->description) ?></p>
      <?php endif; ?>

      <?php if (!empty($recipe->instructions)) : ?>
        <h4 class="mt-4">Instructions</h4>
        <p><?= nl2br(htmlspecialchars($recipe->instructions)) ?></p>
      <?php endif; ?>

    </div>
  </main>

  <footer class="text-white text-center py-3 mt-auto" style="background-color: #e78277;">
      &copy; <?= date('Y') ?> Romain Tang. Tous droits réservés.
  </footer>

</body>
</html>