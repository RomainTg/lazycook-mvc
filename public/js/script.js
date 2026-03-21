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
              list.innerHTML += `<li><a class="dropdown-item" href="#">${ing.name}</a></li>`;
            });
          }

          // Affiche le 2ème dropdown
          document.getElementById('ingredientsDropdownWrapper').style.display = 'block';
        });
    });
});