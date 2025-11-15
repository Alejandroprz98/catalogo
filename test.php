<?php
try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3308;dbname=catalogo", "laravel_user", "laravel123");
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
