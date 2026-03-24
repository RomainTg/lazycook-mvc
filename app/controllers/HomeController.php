<?php 

require_once '../app/models/categories.php';
require_once '../app/models/recipes.php';

class HomeController extends Controller {

    public function index() {
        $categoryModel = $this->model('Category');
        $categories = $categoryModel->getAllCategories();
        $this->view('home/index', [
            'title'      => 'Accueil',
            'categories' => $categories
        ]);
    }

    public function getIngredients() {
        header('Content-Type: application/json');
        $categoryId = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;
        $categoryModel = $this->model('Category');
        $ingredients = $categoryModel->getIngredientsByCategory($categoryId);
        echo json_encode($ingredients);
        exit;
    }

    public function searchRecipes() {
        $ids = isset($_GET['ingredient_ids']) ? $_GET['ingredient_ids'] : '';

        // Validation : uniquement des entiers séparés par virgules
        $ingredientIds = array_filter(
            array_map('intval', explode(',', $ids)),
            fn($id) => $id > 0
        );

        $recipes = [];
        if (!empty($ingredientIds)) {
            $recipeModel = $this->model('Recipes');
            $recipes = $recipeModel->getRecipesByIngredients($ingredientIds);
        }

        $this->view('home/results', [
            'title'   => 'Résultats',
            'recipes' => $recipes
        ]);
    }
}
