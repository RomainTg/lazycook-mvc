<?php

class Controller {
    // Charger un modèle
    public function model($model) {

        $db = new Database();
        return new $model($db);
    }

    // Charger une vue
    public function view($view, $data = []) {
        extract($data);
        require_once '../app/views/' . $view . '.php';
    }
}