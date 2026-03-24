const selectedIngredients = [];

document.querySelectorAll('.category-item').forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      const categoryId   = this.dataset.id;
      const categoryName = this.dataset.name;

      // Met à jour le label du 1er dropdown
      document.getElementById('categoriesDropdown').textContent = categoryName;

      // Fetch les ingrédients
      fetch(`/lazycooking/public/HomeController/getIngredients?category_id=${categoryId}`)
        .then(res => res.json())
        .then(ingredients => {
          const list = document.getElementById('ingredientsList');
          list.innerHTML = '';

          if (ingredients.length === 0) {
            list.innerHTML = '<li><span class="dropdown-item text-muted">Aucun ingrédient</span></li>';
          } else {
            ingredients.forEach(ing => {
              list.innerHTML += `<li><a class="dropdown-item ingredient-item" href="#" data-id="${ing.id}" data-name="${ing.name}">${ing.name}</a></li>`;
            });
          }

          // Affiche le 2ème dropdown
          document.getElementById('ingredientsDropdownWrapper').style.display = 'block';
          attachIngredientListeners();
        });
    });
});

function attachIngredientListeners() {
  document.querySelectorAll('.ingredient-item').forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      const id = parseInt(this.dataset.id);
      const name = this.dataset.name;

      if (selectedIngredients.length >= 5) {
        alert('Vous ne pouvez sélectionner que 5 ingrédients maximum.');
        return;
      }
      if (selectedIngredients.find(i => i.id === id)) {
        alert('Cet ingrédient est déjà sélectionné.');
        return;
      }

      selectedIngredients.push({ id, name });
      renderSelectedIngredients();
    });
  });
}

function renderSelectedIngredients() {
  let container = document.getElementById('selectedIngredientsContainer');
  if (!container) {
    container = document.createElement('div');
    container.id = 'selectedIngredientsContainer';
    container.className = 'mt-3';
    // Insérer les dropdowns
    document.querySelector('.d-flex.gap-3').insertAdjacentElement('afterend', container);
  }

container.innerHTML = `
  <div class="d-flex align-items-baseline gap-3 mb-2">
    <h5 class="mb-0">Ingrédients sélectionnés (${selectedIngredients.length}/5) :</h5>
    <button type="button" id="clearAllBtn" class="btn btn-sm btn-outline-danger">
      ✕ Tout effacer
    </button>
  </div>
    <div class="d-flex flex-wrap gap-2 mb-3">
      ${selectedIngredients.map(ing => `
        <span class="badge d-flex align-items-center gap-1"
          style="background-color:#ee5f4f; font-size:0.95rem; padding:0.5em 0.8em;">
          ${ing.name}
          <button type="button" class="btn-close btn-close-white btn-sm"
            data-id="${ing.id}" aria-label="Supprimer"
            style="font-size:0.6rem;"></button>
        </span>
      `).join('')}
    </div>
        ${selectedIngredients.length > 0 ? `
            <button class="btn" id="searchBtn"
                style="background-color:#ee5f4f; color:white; border-color:#e78277;">
                🔍 Chercher des recettes
            </button>
        ` : ''}
    `;

  // Bouton "Tout effacer"
  document.getElementById('clearAllBtn').addEventListener('click', function () {
    selectedIngredients.length = 0; // Vider le tableau
    container.innerHTML = ''; // Vider le conteneur
  });

  // Boutons de suppression individuels
    container.querySelectorAll('.btn-close').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = parseInt(this.dataset.id);
            const index = selectedIngredients.findIndex(i => i.id === id);
            if (index !== -1) selectedIngredients.splice(index, 1);
            renderSelectedIngredients();
        });
    });

    // Bouton chercher
    const searchBtn = document.getElementById('searchBtn');
    if (searchBtn) {
        searchBtn.addEventListener('click', searchRecipes);
    }
}

function searchRecipes() {
    const ids = selectedIngredients.map(i => i.id).join(',');
    // Redirection vers la page résultats
    window.location.href = `/lazycooking/public/HomeController/searchRecipes?ingredient_ids=${ids}`;
}