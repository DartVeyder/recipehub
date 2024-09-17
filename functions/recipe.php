<?php
include_once "database.php";
function recipeList(){
    $sql = 'SELECT r.title, r.image, r.description, r.created_at, r.views, c.name as category_name, COUNT(rv.id) AS total_reviews FROM recipes r 
                LEFT JOIN categories c ON  r.category_id = c.id 
                LEFT JOIN reviews rv ON  rv.recipe_id  = r.id  
                WHERE r.active = ? GROUP BY r.id';
    $params = [1];
    return query($sql, $params);
}
