<?php
// Підключення конфігураційного файлу з параметрами підключення до бази даних.
require_once 'config/database.php';

/**
 * Функція для встановлення з'єднання з базою даних.
 * @return PDO|null Повертає об'єкт PDO при успішному підключенні або null у разі помилки.
 */
function getConnection() {
    try {
        // Створення нового об'єкта PDO з параметрами підключення з конфігураційного файлу.
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        // Встановлення режиму помилок на виключення для кращого відловлювання помилок.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo; // Повертає об'єкт з'єднання.
    } catch (PDOException $e) {
        // Виведення повідомлення про помилку у разі невдалого підключення.
        echo 'Connection failed: ' . $e->getMessage();
        return null; // Повертає null у разі невдалого підключення.
    }
}

/**
 * Функція для виконання SQL-запиту SELECT з необов'язковими параметрами.
 * @param string $query SQL-запит для виконання.
 * @param array $params Параметри для підготовленого запиту (за замовчуванням порожній масив).
 * @return array Повертає масив рядків з результатами запиту.
 */
function all($query, $params = []) {
    $pdo = getConnection(); // Отримання з'єднання з базою даних.
    if ($pdo === null) {
        return []; // Повертає порожній масив, якщо підключення не вдалося.
    }

    // Підготовка та виконання SQL-запиту.
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    // Повертає всі результати запиту у вигляді асоціативного масиву.
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Функція для вставки даних у таблицю бази даних.
 * @param string $table Назва таблиці для вставки.
 * @param array $data Масив даних для вставки у форматі [назва_колонки => значення].
 * @return bool Повертає true при успішній вставці або false у разі помилки.
 */
function insert($table, $data) {
    $pdo = getConnection(); // Отримання з'єднання з базою даних.
    if ($pdo === null) {
        return false; // Повертає false, якщо підключення не вдалося.
    }

    // Формування списку колонок та плейсхолдерів для вставки.
    $columns = implode(', ', array_keys($data));
    $placeholders = implode(', ', array_fill(0, count($data), '?'));
    // Створення SQL-запиту на вставку даних.
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

    // Підготовка та виконання запиту.
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(array_values($data)); // Виконує запит з переданими значеннями.
}

/**
 * Функція для оновлення даних у таблиці бази даних.
 * @param string $table Назва таблиці для оновлення.
 * @param array $data Масив даних для оновлення у форматі [назва_колонки => значення].
 * @param array $conditions Умови для оновлення у форматі [назва_колонки => значення].
 * @return bool Повертає true при успішному оновленні або false у разі помилки.
 */
function update($table, $data, $conditions) {
    $pdo = getConnection(); // Отримання з'єднання з базою даних.
    if ($pdo === null) {
        return false; // Повертає false, якщо підключення не вдалося.
    }

    // Формування списку колонок та значень для оновлення.
    $set = [];
    foreach ($data as $column => $value) {
        $set[] = "$column = ?";
    }
    $setClause = implode(', ', $set); // Створення частини запиту SET.

    // Формування умов для оновлення (WHERE).
    $where = [];
    foreach ($conditions as $column => $value) {
        $where[] = "$column = ?";
    }
    $whereClause = implode(' AND ', $where); // Створення частини запиту WHERE.

    // Створення SQL-запиту на оновлення даних.
    $sql = "UPDATE $table SET $setClause WHERE $whereClause";

    // Підготовка та виконання запиту.
    $stmt = $pdo->prepare($sql);
    // Виконує запит з переданими значеннями для оновлення та умов.
    return $stmt->execute(array_merge(array_values($data), array_values($conditions)));
}

/**
 * Функція для видалення даних з таблиці бази даних.
 * @param string $table Назва таблиці для видалення.
 * @param array $conditions Умови для видалення у форматі [назва_колонки => значення].
 * @return bool Повертає true при успішному видаленні або false у разі помилки.
 */
function dbDelete($table, $conditions) {
    $pdo = getConnection(); // Отримання з'єднання з базою даних.
    if ($pdo === null) {
        return false; // Повертає false, якщо підключення не вдалося.
    }

    // Формування умов для видалення (WHERE).
    $where = [];
    foreach ($conditions as $column => $value) {
        $where[] = "$column = ?";
    }
    $whereClause = implode(' AND ', $where); // Створення частини запиту WHERE.

    // Створення SQL-запиту на видалення даних.
    $sql = "DELETE FROM $table WHERE $whereClause";

    // Підготовка та виконання запиту.
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(array_values($conditions)); // Виконує запит з переданими значеннями умов.
}

/**
 * Функція для виконання довільного SQL-запиту з необов'язковими параметрами.
 * @param string $sql SQL-запит для виконання.
 * @param array $params Параметри для підготовленого запиту (за замовчуванням порожній масив).
 * @return array|bool Повертає результати запиту або false у разі помилки.
 */
function query($sql, $params = []) {
    $pdo = getConnection(); // Отримання з'єднання з базою даних.
    if ($pdo === null) {
        return false; // Повертає false, якщо підключення не вдалося.
    }

    // Підготовка та виконання SQL-запиту.
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    // Повертає всі результати запиту у вигляді асоціативного масиву.
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
