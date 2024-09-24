
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
<a class="add-button"><i class="fas fa-plus"></i></a>

<div class="container">

    <div class="row">
        <?php

        // додавання рецепту
//        create(
//            'Грецький салат',
//            'Смачний салат із свіжих овочів та сиру фета.',
//            '1. Нарізати овочі. 2. Додати сир та оливки. 3. Перемішати.',
//            1,  // ID категорії 'Салати'
//            1   // ID користувача 'Іван Іваненко'
//        );
        // Дані для оновлення рецепту
//        $data = [
//            'title' => ' грецький салат 2',
//            'image' => 'https://cdn.abo.media/upload/article/res/770-430/l6e9m4nw7nojas8qooka.jpg',
//            'category_id' => 5,  // ID категорії 'Салати'
//        ];


        // Виклик методу update для оновлення рецепту
       // $updated = update('recipes', $data, [ 'id' => 13  ]// ID рецепту, який потрібно оновити
       // );

        $receipes = recipeList();
        foreach ($receipes as $receipe){
            $created_at = new DateTime($receipe['created_at']);
            echo '<div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4">
                        <div class="card" >
                            <img class="card-img-top"  style="height: 16rem;" src="'. ($receipe['image'] ?$receipe['image']: 'assets/images/none_image.jpg') .'" alt="'.$receipe['title'].'">
                         
                            <div class="card-img-overlay" style="right: auto;bottom: auto;    
                        width: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                    }">
                                <a href="#" class="btn btn-light btn-sm">'.$receipe['category_name'].'</a>
                                  <div class="action">
                             <a href="#" class="fas fa-edit text-info "></a> 
                             <a href="?function=recipe&action=delete&id='.$receipe['id'].'" class="fas fa-trash-alt text-danger ml-3"></a> 
                    </div>
                               
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"> '.$receipe['title'].'</h4>
                    
                                <p class="card-text">'.$receipe['description'].'</p>
                                <a href="/recipe.php?id='.$receipe['id'].'" class="btn btn-info">Читати</a>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                                <div class="views">'.$created_at->format('d.m.Y, H:i').'
                                </div>
                                <div class="stats">
                                    <i class="far fa-eye"></i> '.$receipe['views'].'
                                    <i class="far fa-comment"></i> '.$receipe['total_reviews'].'
                                </div>
                    
                            </div>
                        </div>
                    
                    </div>';
        }
        ?>


    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
<style>


    .add-button {
        position: fixed;
        bottom: 10px;
        right: 10px;
        width: 70px;
        height: 70px;
        background: #0dcaf0;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        text-decoration: none;
        font-size: 50px;
        line-height: 45px;
        border-radius: 10px;
        color:#fff;
    }
</style>
</html>
