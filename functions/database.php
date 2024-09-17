<?php
require_once 'config/database.php';
function getConnection() {

    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        return null;
    }
}
function all($query, $params = []) {
    $pdo = getConnection();
    if ($pdo === null) {
        return [];
    }

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function insert($table, $data) {
    $pdo = getConnection();
    if ($pdo === null) {
        return false;
    }

    $columns = implode(', ', array_keys($data));
    $placeholders = implode(', ', array_fill(0, count($data), '?'));
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute(array_values($data));
}
function update($table, $data, $conditions) {
    $pdo = getConnection();
    if ($pdo === null) {
        return false;
    }

    $set = [];
    foreach ($data as $column => $value) {
        $set[] = "$column = ?";
    }
    $setClause = implode(', ', $set);

    $where = [];
    foreach ($conditions as $column => $value) {
        $where[] = "$column = ?";
    }
    $whereClause = implode(' AND ', $where);

    $sql = "UPDATE $table SET $setClause WHERE $whereClause";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute(array_merge(array_values($data), array_values($conditions)));
}
function dbDelete($table, $conditions) {
    $pdo = getConnection();
    if ($pdo === null) {
        return false;
    }

    $where = [];
    foreach ($conditions as $column => $value) {
        $where[] = "$column = ?";
    }
    $whereClause = implode(' AND ', $where);

    $sql = "DELETE FROM $table WHERE $whereClause";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute(array_values($conditions));
}
function query($sql, $params = []) {
    $pdo = getConnection();
    if ($pdo === null) {
        return false;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
