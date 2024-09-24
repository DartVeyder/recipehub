<?php

function recipeList(){
    $sql = 'SELECT r.id, r.title, r.image, r.description, r.created_at, r.views, c.name as category_name, COUNT(rv.id) AS total_reviews FROM recipes r 
                LEFT JOIN categories c ON  r.category_id = c.id 
                LEFT JOIN reviews rv ON  rv.recipe_id  = r.id  
                WHERE r.active = ? GROUP BY r.id';
    $params = [1];

    return query($sql, $params);
}

function delete($id){
    dbDelete('recipes', ['id' => $id ]);
    header("Location:/recipes.php");
}

function create($title, $description, $instructions, $category_id, $user_id) {
    // SQL запит на вставку нового рецепту
    $sql = "INSERT INTO recipes (title, description, instructions, category_id, user_id) 
            VALUES (:title, :description, :instructions, :category_id, :user_id)";

    // Параметри для запиту
    $params = [
        ':title' => $title,
        ':description' => $description,
        ':instructions' => $instructions,
        ':category_id' => $category_id,
        ':user_id' => $user_id
    ];

    // Виклик функції query для виконання запиту
    return query($sql, $params);
}


function show($id){
    $sql = 'SELECT  r.title, r.image, r.description, r.created_at, r.views, c.name as category_name, COUNT(rv.id) AS total_reviews , r.instructions as instructions FROM recipes r 
                LEFT JOIN categories c ON  r.category_id = c.id 
                LEFT JOIN reviews rv ON  rv.recipe_id  = r.id  
                WHERE r.active = ? AND r.id = ? GROUP BY r.id';
    $params = [1, $id];
    $recipe = query($sql, $params);

    $sql = 'SELECT ri.quantity, i.name FROM recipe_ingredient ri 
            LEFT JOIN ingredients i ON ri.ingredient_id = i.id
                   WHERE ri.recipe_id = ? ';
    $params = [$id];
    $ingredients = query($sql, $params);

    return  ['recipe' =>$recipe[0], 'ingredients' => $ingredients];
}
