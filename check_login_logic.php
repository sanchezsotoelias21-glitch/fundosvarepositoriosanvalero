<?php
$usuarios = require __DIR__ . '/bdd/conexion.php';
$checks = [
    'valid' => ['elias_sanchez', 'elias1234'],
    'invalid' => ['cualquiera', '123456'],
];
foreach ($checks as $label => [$user, $pass]) {
    $ok = false;
    foreach ($usuarios as $row) {
        $nombre = trim((string)($row['nombre_usuario'] ?? ''));
        $correo = trim((string)($row['correo_usuario'] ?? ''));
        $hash = (string)($row['password_hash'] ?? '');
        if (($nombre === $user || $correo === $user) && ($pass === $hash || password_verify($pass, $hash))) {
            $ok = true;
            break;
        }
    }
    echo $label . ': ' . ($ok ? 'OK' : 'REJECTED') . PHP_EOL;
}
