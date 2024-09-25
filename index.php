<?php
include_once "functions/database.php";
include_once "functions/recipe.php";
include_once "router.php" ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
        <?php
        // додавання рецепту
//                 create(
//                    'Грецький салат',
//                    'Смачний салат із свіжих овочів та сиру фета.',
//                    '1. Нарізати овочі. 2. Додати сир та оливки. 3. Перемішати.',
//                    1,  // ID категорії 'Салати'
//                     1   // ID користувача 'Іван Іваненко'
//                );
        // Дані для оновлення рецепту
//                $data = [
//                    'title' => ' грецький салат 2',
//                    'image' => 'https://cdn.abo.media/upload/article/res/770-430/l6e9m4nw7nojas8qooka.jpg',
//                    'category_id' => 5,  // ID категорії 'Салати'
//                ];


        //Виклик методу update для оновлення рецепту
//         $updated = update('recipes', $data, [ 'id' => 16  ]// ID рецепту, який потрібно оновити
//         );

        $receipes = recipeList();
        echo '<table class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Назва</th>
                            <th>Опис</th>
                            <th>Інструкції</th>
                            <th>Категорія</th>
                            <th>Користувач ID</th>
                            <th>Перегляди</th>
                             <th>Відгуків</th>
                            <th>Активний</th>
                            <th>Дата створення</th>
                            <th>Дата оновлення</th>
                        </tr>
                      </thead>
                     <tbody>';
        foreach ($receipes as $recipe){

            echo "<tr>
                <td>{$recipe['id']}</td>
                <td>{$recipe['title']}</td>
                <td>{$recipe['description']}</td>
                <td>{$recipe['instructions']}</td>
                <td>{$recipe['category_name']}</td>
                <td>{$recipe['user_id']}</td>
                <td>{$recipe['views']}</td>
                <td>{$recipe['total_reviews']}</td>
                <td>" . ($recipe['active'] ? 'Так' : 'Ні') . "</td>
                <td>{$recipe['created_at']}</td>
                <td>{$recipe['updated_at']}</td>
              </tr>";
        }
        echo '</tbody>
                    </table>';
        ?>


    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
