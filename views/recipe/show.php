<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рецепт: Борщ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e0e0e0);
        }
        .recipe-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }
        .recipe-header {
            background: url('https://via.placeholder.com/1200x400') center/cover no-repeat;
            height: 300px;
            position: relative;
        }
        .recipe-header h1 {
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            position: absolute;
            bottom: 20px;
            left: 20px;
        }
        .ingredients, .instructions {
            padding: 20px;
        }
        .list-group-item {
            background-color: rgba(248, 249, 250, 0.9);
            border: none;
        }
        .btn-custom {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }
        .btn-custom:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="recipe-card">
        <!-- Заголовок зображення -->
        <div class="recipe-header">
            <h1>Рецепт: Борщ</h1>
        </div>

        <!-- Інгредієнти та інструкції -->
        <div class="row g-0">
            <div class="col-md-6 ingredients">
                <h3>Інгредієнти</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">1 л води</li>
                    <li class="list-group-item">300 г буряка</li>
                    <li class="list-group-item">200 г капусти</li>
                    <li class="list-group-item">100 г моркви</li>
                    <li class="list-group-item">150 г картоплі</li>
                    <li class="list-group-item">1 цибулина</li>
                    <li class="list-group-item">Сіль та перець за смаком</li>
                    <li class="list-group-item">Лавровий лист</li>
                    <li class="list-group-item">Сметана для подачі</li>
                </ul>
            </div>
            <div class="col-md-6 instructions">
                <h3>Інструкції</h3>
                <ol class="list-group list-group-numbered list-group-flush">
                    <li class="list-group-item">Почистіть та наріжте овочі.</li>
                    <li class="list-group-item">Доведіть воду до кипіння та додайте картоплю.</li>
                    <li class="list-group-item">Додайте буряк і варіть 10 хвилин.</li>
                    <li class="list-group-item">Додайте моркву, капусту і цибулю, продовжуйте варити.</li>
                    <li class="list-group-item">Приправте сіллю, перцем та лавровим листом.</li>
                    <li class="list-group-item">Готуйте на повільному вогні ще 20 хвилин.</li>
                    <li class="list-group-item">Подавайте зі сметаною.</li>
                </ol>
            </div>
        </div>

        <!-- Кнопки дій -->
        <div class="row g-0">
            <div class="col-12 text-center py-4">
                <a href="#" class="btn btn-custom me-2">Редагувати рецепт</a>
                <a href="#" class="btn btn-danger">Видалити рецепт</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
