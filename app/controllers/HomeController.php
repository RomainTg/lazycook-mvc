<?php 

require_once '../app/models/Ingredient.php';

class HomeController extends Controller {

    public function index() {
        $ingredientModel = $this->model('Ingredient'); // crée $db et le passe au model
        $ingredients = $ingredientModel->getAllIngredients();
        $this->view('home/index', [
            'ingredients' => $ingredients,
            'title' => 'Recettes de la flemme'
            ]);
    }
}
