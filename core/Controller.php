<?php

class Controller {
    // Charger un modèle
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // Charger une vue
    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }
}