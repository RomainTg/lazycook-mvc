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
}