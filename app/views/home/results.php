<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

  <!-- Navbar (identique à index.php) -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #e78277;">
    <div class="container">
      <a class="navbar-brand" href="/lazycooking/public/index">Recettes de la flemme</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="/lazycooking/public/index">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="/lazycooking/public/RecipesController">Recettes</a></li>
          <li class="nav-item"><a class="nav-link" href="/lazycooking/public/contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="flex-grow-1">
    <div class="container mt-5">

      <h2 class="mb-1">Résultats de ta recherche</h2>
      <p class="text-muted mb-4">Recettes triées par nombre d'ingrédients en commun</p>

      <?php if (empty($recipes)): ?>
        <div class="alert" style="background-color:#fde8e6; color:#c0392b; border-color:#ee5f4f;">
          Aucune recette ne correspond à tes ingrédients. Essaie avec d'autres !
        </div>
      <?php else: ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php foreach ($recipes as $recipe): ?>
            <div class="col">
              <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                  <h5 class="card-title"><?= htmlspecialchars($recipe->title) ?></h5>
                  <span class="badge mb-2" style="background-color:#ee5f4f;">
                    <?= $recipe->match_count ?> ingrédient(s) en commun
                  </span>
                  <p class="card-text text-muted">
                    <?= htmlspecialchars($recipe->description ?? 'Pas de description disponible.') ?>
                  </p>
                </div>
                <div class="card-footer bg-white border-0">
                  <a href="/lazycooking/public/RecipesController/showRecipe/<?= $recipe->id ?>"
                     class="btn btn-sm" style="background-color:#ee5f4f; color:white; border-color:#ee5f4f;">
                    Voir la recette →
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <a href="/lazycooking/public/index" class="btn btn-outline-secondary mt-5">← Nouvelle recherche</a>

    </div>
  </main>

  <!-- Footer -->
  <footer class="text-white text-center py-3 mt-auto" style="background-color: #e78277;">
    &copy; <?= date('Y') ?> Romain Tang. Tous droits réservés.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

