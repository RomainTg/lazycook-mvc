<?php 

class Category {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllCategories() {
        $this->db->query("SELECT * FROM categories ORDER BY name ASC");
        return $this->db->fetchAll();
    }

    public function getIngredientsByCategory($categoryId) {
        $this->db->query("SELECT * FROM ingredients WHERE category_id = :category_id ORDER BY name ASC");
        return $this->db->fetchAllWithParams([':category_id' => $categoryId]);
    }
}