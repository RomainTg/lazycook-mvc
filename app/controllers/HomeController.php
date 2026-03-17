<?php 

class HomeController extends Controller {
    public function index() {
        // Charger le modèle et récupérer les données
        //$recipeModel = $this->model('Recipe');
        //$recipes = $recipeModel->getAllRecipes();

         $data = [
            'title' => 'Bienvenue sur mon site MVC',
            'content' => 'Ceci est un exemple simple avec Bootstrap.'
        ];

        // Charger la vue et passer les données
        // $this->view('home/index', ['recipes' => $recipes]);
        $this->view('home/index', $data);
    }
}