<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Recettes de la flemme</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Recettes</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
  <h2>Choisir un ingrédient</h2>

  <div class="dropdown">
      <!-- Bouton du dropdown -->
      <button class="btn btn-primary dropdown-toggle" type="button" id="ingredientsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          Sélectionner un ingrédient
      </button>
      <ul class="dropdown-menu" style="max-height:200px; overflow-y:auto;">
        <?php foreach($ingredients as $ingredient): ?>
            <li><a class="dropdown-item" href="#"><?= htmlspecialchars($ingredient->name) ?></a></li>
        <?php endforeach; ?>
    </ul>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
      &copy; <?= date('Y') ?> ABC. Tous droits réservés.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>