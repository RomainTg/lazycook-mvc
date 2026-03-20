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
}