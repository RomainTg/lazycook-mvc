<?php 

class Ingredient {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllIngredients() {
        $this->db->query("SELECT * FROM ingredients ORDER BY name ASC");
        return $this->db->fetchAll();
    }
}