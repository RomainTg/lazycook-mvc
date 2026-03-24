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

    public function getRecipesByIngredientId($ingredientId) {
        if (empty($ingredientIds)) {
        return [];

        $placeholders = implode(',', array_fill(0, count($ingredientIds), '?'));
        
        $this->db->query("SELECT r.*, COUNT(ri.ingredient_id) AS match_count
                            FROM recipes r
                            JOIN recipe_ingredients ri ON r.id = ri.recipe_id
                            WHERE ri.ingredient_id IN ($placeholders)
                            GROUP BY r.id
                            ORDER BY match_count DESC, r.name ASC
                        ");

        return $this->db->fetchAllWithIndexedParams($ingredientIds);
        }
    }
}