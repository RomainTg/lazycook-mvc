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
      <a class="navbar-brand" href="/lazycooking/public/index">Recettes de la flemme</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="/lazycooking/public/index">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="/lazycooking/public/RecipesController">Recettes</a></li>
          <li class="nav-item"><a class="nav-link" href="/lazycooking/public/contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main>

  <div class="container mt-5">
    <h1>Bienvenue sur recettes de la flemme !</h1>
    <p class="lead">Découvre des recettes simples et rapides pour les jours où tu n'as pas envie de passer des heures en cuisine.<br>
    Parce que oui ! La flemme c'est contagieux.</p>
    <p class="lead fw-semibold">Le concept est simple :</p>
    <p class="lead">Tu sélectionnes une catégorie d'ingrédients, puis un ingrédient spécifique, et hop !<br>
      Tu obtiens une liste de recettes qui utilisent ce(s) ingrédient(s).<br> C'est parfait pour trouver l'inspiration quand tu ne sais 
      pas quoi cuisiner avec ce que tu as sous la main.</p>
  </div>

  <div class="container mt-5">
  <h2 class="mb-3">Choisis tes ingrédients :</h2>

  <div class="d-flex gap-3 flex-wrap">
    <!-- Dropdown 1 : Catégories -->
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="categoriesDropdown"
        data-bs-toggle="dropdown" aria-expanded="false"
        style="background-color: #ee5f4f; border-color: #e78277;">
        Sélectionne une catégorie
      </button>
      <ul class="dropdown-menu" style="max-height:200px; overflow-y:auto;">
        <?php foreach($categories as $category): ?>
          <li>
            <a class="dropdown-item category-item" href="#"
              data-id="<?= $category->id ?>"
              data-name="<?= htmlspecialchars($category->name) ?>">
              <?= htmlspecialchars($category->name) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Dropdown 2 : Ingrédients (caché par défaut) -->
    <div class="dropdown" id="ingredientsDropdownWrapper" style="display:none;">
      <button class="btn btn-primary dropdown-toggle" type="button" id="ingredientsDropdown"
        data-bs-toggle="dropdown" aria-expanded="false"
        style="background-color: #ee5f4f; border-color: #e78277;">
        Sélectionne un ingrédient
      </button>
      <ul class="dropdown-menu" id="ingredientsList" style="max-height:200px; overflow-y:auto;">
      </ul>
    </div>
  </div>
  
  </main>

  <!-- Footer -->
  <footer class="text-white text-center py-3 mt-auto" style="background-color: #e78277;">
      &copy; <?= date('Y') ?> Romain Tang. Tous droits réservés.
  </footer>

  <script src="../public/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>