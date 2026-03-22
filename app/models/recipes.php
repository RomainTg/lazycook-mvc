<?php 

class Recipes{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllRecipes() {
        $this->db->query("SELECT * FROM recipes ORDER BY title ASC");
        return $this->db->fetchAll();
    }

    public function getRecipeById($id) {
        $this->db->query("SELECT * FROM recipes WHERE id = :id");
        return $this->db->fetchWithParams(['id' => $id]);
    }
}