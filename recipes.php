
<?php
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
        <?
        $receipes = recipeList();
        foreach ($receipes as $receipe){
            $created_at = new DateTime($receipe['created_at']);
             include "views/recipe/card.php";
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
