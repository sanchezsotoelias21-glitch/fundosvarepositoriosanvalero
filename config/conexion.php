<?php

$config = require __DIR__ . '/bd.php';

$dsn = sprintf(
    '%s:host=%s;dbname=%s;charset=%s',
    $config['driver'],
    $config['host'],
    $config['database'],
    $config['charset']
);

try {
    $pdo = new PDO($dsn, $config['user'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    die('Error de conexión a la base de datos: ' . $e->getMessage());
}

return $pdo;
