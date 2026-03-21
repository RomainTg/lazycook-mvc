<?php 

require_once '../app/models/categories.php';

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
}
