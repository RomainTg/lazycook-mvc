<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #e78277;">
    <div class="container">
      <a class="navbar-brand" href="index.php">Recettes de la flemme</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="/lazycooking/public/index">Accueil</a></li>
          <li class="nav-item"><a class="nav-link active" href="/lazycooking/public/RecipesController">Recettes</a></li>
          <li class="nav-item"><a class="nav-link" href="/lazycooking/public/contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main>

  <div class="container mt-5">
    <h2>Nos recettes de flemmard(e)s </h2>

    <?php if (!empty($recipes)) : ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
          <?php foreach ($recipes as $recipe) : ?>
            <div class="col">
              <div class="card h-100">
 
                <?php if (!empty($recipe->image)) : ?>
                  <img src="<?= htmlspecialchars($recipe->image) ?>" class="card-img-top" alt="<?= htmlspecialchars($recipe->title) ?>">
                <?php else : ?>
                  <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height:200px; border-radius: 12px 12px 0 0;">
                    <span style="font-size: 5rem;">🍽️</span>
                  </div>
                <?php endif; ?>
 
                <div class="card-body d-flex flex-column">
                  <?php if (!empty($recipe->category)) : ?>
                    <span class="badge badge-category mb-2 align-self-start"><?= htmlspecialchars($recipe->category) ?></span>
                  <?php endif; ?>
 
                  <h5 class="card-title"><?= htmlspecialchars($recipe->title) ?></h5>
 
                  <?php if (!empty($recipe->description)) : ?>
                    <p class="card-text text-muted flex-grow-1"><?= htmlspecialchars($recipe->description) ?></p>
                  <?php endif; ?>
 
                  <div class="d-flex justify-content-right align-items-center mt-3">
                    <?php if (!empty($recipe->cooking_time)) : ?>
                      <small class="text-muted">⏱️ <?= htmlspecialchars($recipe->cooking_time) ?> min</small>
                    <?php endif; ?>
                    <a href="/lazycooking/public/recipes/<?= $recipe->id ?>" style="display: inline-flex; align-items: center; gap: 4px; background: none; border: none; color: #e78277; font-size: 13px; font-weight: 500; text-decoration: none; padding: 0; margin-left: auto;">
                      Voir la recette
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="#e78277" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                  </div>
                </div>
 
              </div>
            </div>
          <?php endforeach; ?>
        </div>
 
      <?php else : ?>
        <div class="alert alert-info mt-4">Aucune recette disponible pour le moment.</div>
      <?php endif; ?>
 
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-white text-center py-3 mt-auto" style="background-color: #e78277;">
      &copy; <?= date('Y') ?> Romain Tang. Tous droits réservés.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>