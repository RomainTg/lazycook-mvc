<?php
require_once '../app/models/Recipes.php';

class RecipesController extends Controller {

    public function index() {
        $recipeModel = $this->model('Recipes');
        $recipes = $recipeModel->getAllRecipes();
        $this->view('recipes/index', [
            'title'   => 'Recettes',
            'recipes' => $recipes
        ]);
    }

    public function showRecipe($id) {
    $recipeModel = $this->model('Recipes');
    $recipe = $recipeModel->getRecipeById($id);
    $this->view('recipes/showRecipe', [
        'title'  => $recipe->title,
        'recipe' => $recipe
    ]);
}
}