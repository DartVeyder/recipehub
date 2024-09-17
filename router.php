<?php

// Отримуємо поточний URI
$function = @$_GET['function'];

// Обробка маршруту за допомогою switch
switch ($function) {
    case 'recipe':
        require_once 'functions/recipe.php';
        if($_GET['action'] == 'delete' && isset($_GET['id']))
             delete($_GET['id']);
        break;

}
